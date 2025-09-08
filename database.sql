CREATE DATABASE belajar_laravel;
USE belajar_laravel;

CREATE TABLE categories
(
    id VARCHAR(100) NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
ENGINE=InnoDB;

DESC categories;

