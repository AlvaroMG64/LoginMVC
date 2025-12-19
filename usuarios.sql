CREATE DATABASE IF NOT EXISTS `login-php`;
USE `login-php`;

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
    `coduser` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idusuario` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `admitido` TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERTs generados desde generar_insert_hash.php
-- COPIAR AQUÍ LOS INSERTS QUE TE DEVUELVA EL PHP