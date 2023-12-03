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
    // Hash du mot de passe
    $hashedPassword = password_hash($formPassword, PASSWORD_DEFAULT);
    // Création d'un utilisateur
    $stmt = $pdo->prepare('INSERT INTO users(id, email, nom, prenom, allergie, motDePasse) VALUES (UUID(), :email, :nom, :prenom, :allergene, :password)');
    $stmt->bindParam(':email', $formEmail);
    $stmt->bindParam(':nom', $formNom);
    $stmt->bindParam(':prenom', $formPrenom);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':allergene', $formAllergene);
    if ($stmt->execute()) {
        $stmtUser = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmtUser->bindValue(':email', $formEmail);
        $stmtUser->execute();
        $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
        $stmtRole = $pdo->prepare('INSERT INTO roles_users(user_id, role_id) VALUES (:id, 1)');
        $stmtRole->bindValue(':id', $user['id']);
        $stmtRole->execute();
        header('location: http://localhost/ECF-entrainement/Connexion/connexion.php');
        exit();
    } else {
        echo "Impossible de créer l'utilisateur";
    }
} catch (PDOException $e){
    echo "Erreur lors de la création de l'utilisateur: ". $e->getMessage();
};