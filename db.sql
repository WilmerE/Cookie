CREATE DATABASE users;
use users;

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `cookie` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_user`)
)

INSERT INTO users VALUES("", "wpelico", "admin", "")