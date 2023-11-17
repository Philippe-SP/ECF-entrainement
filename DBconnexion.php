<?php

$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

try{
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Récupération des données du formulaire de connexion
    $formEmail = $_POST['email'];
    $formPassword = $_POST['password'];
    $mdp = hash('SHA1', $formPassword);
    //Récupération des utilisateurs
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
    $stmt->bindParam(':email', $formEmail);
    $stmt->execute();
    // vérification de si l'email existe dans la bdd et si le mdp ets le bon
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($mdp === $user['motDePasse']){
            echo 'connexion reussie, bienvenue '.$user['prenom'];
        }else {
            echo 'mot de passe incorrect.';
        }
    }else {
        echo 'Utilisateur introuvable, vérifiez votre email.';
    }
} catch (PDOException $e){
    echo 'Erreur de connexion à la base de données : '. $e->getMessage();
}