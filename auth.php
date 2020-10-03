<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'cookie';

$conection = @mysqli_connect($host,$user,$password,$db);
if(!$conection){
	echo "Error en la conexion";
}
	#Validar inicio de sesión
$usuario = isset($_POST['username']);
$pass = isset($_POST['password']);
$recordar = isset($_POST['recordar']);

$sql = $conection->query("SELECT * FROM users 
					WHERE username='".$_POST["username"]."' 
					AND password='".$_POST["password"]."';");

if(!empty($sql) AND mysqli_num_rows($sql) > 0){
	$row = mysqli_fetch_array($sql);
	$user = $row["username"];
	if($recordar){
		if($_POST['recordar'] == true){
			mt_srand(time());
			$rand = mt_rand(1000000,9999999);
			$conection->query("UPDATE users SET cookie='".$rand."' WHERE id_user=".$row["id_user"])
			or die($conection->mysqli_error());
			setcookie("id_user", $row["id_user"], time()+(60*60*24*365));
			setcookie("marca", $rand, time()+(60*60*24*365));
		}
	}
	echo "<spam style='color:green'>Identificado correctamente.</spam>";
}else{
	echo "<spam style='color:red'>Identificación incorrecta.</spam>";
}
?>