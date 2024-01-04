-- Copy and paste into SQL command box in phpMyadmin

-- First, this command creates a database called membership

CREATE DATABASE membership;



-- Second, this command creates a table called users within the membership database

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT, 
    username VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
