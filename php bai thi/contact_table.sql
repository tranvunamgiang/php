CREATE DATABASE phonebook;

USE phonebook;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(12) NOT NULL
);
