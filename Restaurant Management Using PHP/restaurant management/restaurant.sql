CREATE DATABASE IF NOT EXISTS restaurant;
USE restaurant;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS menu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(255) NOT NULL,
    price DECIMAL(8, 2) NOT NULL
);

INSERT INTO menu (item_name, price) VALUES
('Pizza', 12.99),
('Burger', 8.99),
('Pasta', 10.99),
('Salad', 6.99);
