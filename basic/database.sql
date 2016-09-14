CREATE DATABASE bikebase;

CREATE TABLE `bike`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `fabricante` VARCHAR(50) NOT NULL,
    `modelo` VARCHAR(25) NOT NULL,
    `cor` VARCHAR(25) NOT NULL,
    `marcha` ENUM('sim', 'nao') DEFAULT 'nao',
    `marcadocambio` VARCHAR(25), 
    `proprietario` VARCHAR(50) NOT NULL, 
    `email` VARCHAR(50)
) CHARSET=utf8;
    
