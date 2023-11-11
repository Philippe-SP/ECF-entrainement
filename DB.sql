CREATE DATABASE sandrineNutrition

CREATE TABLE clients 
(
    id INT NOT NULL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    allergie VARCHAR(50) NOT NULL
)

CREATE TABLE admin
(
    id CHAR(36) PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50)
)

CREATE TABLE recettes
(
    id CHAR(36) PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(150),
    tpsPreparation INT(120),
    tpsCuisson INT(120),
    tpsRepos INT(120),
    ingredients VARCHAR(150),
    etapes VARCHAR(150),
    allergene VARCHAR(150),
    regime VARCHAR(150)
)