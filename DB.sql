CREATE DATABASE sandrineNutrition

CREATE TABLE users 
(
    id CHAR(36) NOT NULL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    allergie VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    motDePasse VARCHAR(250) NOT NULL
);

CREATE TABLE roles 
(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE roles_users
(
    user_id CHAR(36) NOT NULL,
    role_id INT(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (role_id) REFERENCES roles(id),
    PRIMARY KEY (user_id, role_id)
);

INSERT INTO roles (nom) VALUES ('ROLE_USER'), ('ROLE_ADMIN');
INSERT INTO users VALUES 
(UUID(), 'Coupart', 'Sandrine', 'aucun', 'sandrineCoupart@mail.com', '$2y$10$I3ifUnE6f.yCD6sIHjRJXuYjSet3/4KiwkxvFhlUL3X5W1dMLbdiO');
-- Hash du mot de passe de Sandrine Coupart trouver sur un covertisseur Bcrypt pour qu'il sois reconnaissable par le formulaire de connexion
-- Ajout des autres utilisateurs de la table "users" via le formulaire de connexion

INSERT INTO roles_users VALUES ('6019317e-906a-11ee-b101-b445068fba4d', 1);
INSERT INTO roles_users VALUES ('46ebcde8-906e-11ee-b101-b445068fba4d', 2);

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
);

