CREATE DATABASE Participant;
USE Participant;
CREATE TABLE information (
    id smallint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(80),
    Prenom VARCHAR(180),
    Email VARCHAR(150),
    Num VARCHAR(10)
)
