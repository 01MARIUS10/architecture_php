DROP TABLE IF EXISTS `parcour`;
DROP TABLE IF EXISTS `etudiant`;


DROP DATABASE IF EXISTS `GestionEtudiant`;
CREATE DATABASE `GestionEtudiant`;

USE `GestionEtudiant`;

CREATE TABLE IF NOT EXISTS `parcour`
(
    `parcour_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `parcour_nom` VARCHAR(65) NOT NULL ,
    UNIQUE (`parcour_nom`)
); 

CREATE TABLE IF NOT EXISTS `etudiant`
(
    `etudiant_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `etudiant_nom` VARCHAR(65) NOT NULL ,
    `etudiant_age` INT NOT NULL ,
    `etudiant_parcourId` INT NOT NULL ,
    FOREIGN KEY (`etudiant_parcourId`) REFERENCES `parcour`(`parcour_id`)
); 

INSERT INTO `parcour`(`parcour_nom`) VALUES
("MISA"),("Math appli"),("Fonda"),("PAAC");

INSERT INTO `etudiant`(`etudiant_nom`,`etudiant_age`,`etudiant_parcourId`) VALUES
("Mikardo",22,1),
("Fernand",33,3),
("Dominic",19,2),
("ange",20,4);
