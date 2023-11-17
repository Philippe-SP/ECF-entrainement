<?php

$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

try {
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Récupération des données du formulaire d'inscription
    $formEmail = $_POST['email'];
    $formNom = $_POST['nom'];
    $formPrenom = $_POST['prenom'];
    $formPassword = $_POST['password'];
    $formAllergene = $_POST['allergene'];
    // Création d'un utilisateur
    $stmt = $pdo->prepare('INSERT INTO clients(id, email, nom, prenom, allergie, motDePasse) VALUES (UUID(), :email, :nom, :prenom, :allergene, :password)');
    $stmt->bindValue(':email', $formEmail);
    $stmt->bindValue(':nom', $formNom);
    $stmt->bindValue(':prenom', $formPrenom);
    $stmt->bindValue(':password', hash('SHA1', $formPassword));
    $stmt->bindValue(':allergene', $formAllergene);
    if ($stmt->execute()) {
        header('location: http://localhost/ECF-entrainement/Connexion/connexion.php');
        exit();
    } else {
        echo "Impossible de créer l'utilisateur";
    }
} catch (PDOException $e){
    echo "Erreur lors de la création de l'utilisateur";
}