DROP DATABASE IF EXISTS CRUD ;

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS CRUD;

-- Sélection de la base de données
USE CRUD;

-- Création de la table User
CREATE TABLE IF NOT EXISTS User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) ,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO User (nom,prenom, email, password)
VALUES ('Dupont','DAGONI','dupont@example.com',  'hashed_password');


INSERT INTO User (nom,prenom, email, password)
VALUES 
('Peter','PAN','peter@example.com',  'hashed_password'),
('Mickey','Mousse','mk@example.com',  'hashed_password'),
('Aladin','Kaid','al@kaid.com',  'hashed_password');
