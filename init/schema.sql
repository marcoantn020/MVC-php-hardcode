CREATE DATABASE IF NOT EXISTS `db`;
USE db;

CREATE TABLE IF NOT EXISTS  `db`.`user` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    email VARCHAR(255),
    username VARCHAR(200),
    password VARCHAR(200),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

INSERT INTO `db`.`user` (firstName, lastName, email, username, password)
VALUES ("Marco", "Antonio", "marco@email.com","marco", "$2y$10$REq0ExD43DFB7AaX0OlbPeem9BFZosUsDkk8wgE.RaQzLijCWOqbq");

INSERT INTO `db`.`user` (firstName, lastName, email, username, password)
VALUES ("Naruto", "Uzumaki", "naruto@email.com","naruto", "$2y$10$REq0ExD43DFB7AaX0OlbPeem9BFZosUsDkk8wgE.RaQzLijCWOqbq");

INSERT INTO `db`.`user` (firstName, lastName, email, username, password)
VALUES ("Kyotaka", "Ayanokoji", "kyotaka@email.com","kyotaka", "$2y$10$REq0ExD43DFB7AaX0OlbPeem9BFZosUsDkk8wgE.RaQzLijCWOqbq");

INSERT INTO `db`.`user` (firstName, lastName, email, username, password)
VALUES ("Fulano", "da Silva", "fulano@email.com","fulano", "$2y$10$REq0ExD43DFB7AaX0OlbPeem9BFZosUsDkk8wgE.RaQzLijCWOqbq");