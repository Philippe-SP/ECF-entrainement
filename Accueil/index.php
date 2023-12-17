<?php
session_start();

$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

if (isset($_POST['connexion'])) {
    try{
        $pdo = new PDO($dsn, $username);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Récupération des données du formulaire de connexion
        $formEmail = $_POST['email'];
        $formPassword = $_POST['password'];
        //Récupération des utilisateurs
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $formEmail);
        $stmt->execute();
        // vérification de si l'email existe dans la bdd et si le mdp est le bon
        if($stmt->rowCount() == 1){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($formPassword, $user['motDePasse'])){
                $stmtRole = $pdo->prepare("SELECT * FROM roles_users WHERE user_id = :id");
                $stmtRole->bindValue(':id', $user['id']);
                $stmtRole->execute();
                $role = $stmtRole->fetch(PDO::FETCH_ASSOC);
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['role'] = $role['role_id'];
            }else {
                echo 'mot de passe incorrect.';
            };
        }else {
            echo 'Utilisateur introuvable, vérifiez votre email.';
        }
    } catch (PDOException $e){
        echo 'Erreur de connexion à la base de données : '. $e->getMessage();
    };
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.Nutrition</title>
    <link rel="stylesheet" href="styleHome.css">
</head>
<body>
    <div id="nav">
        <img src="../logo.png" width="140px" height="140px">
        <h1>Sandrine nutrition</h1>
        <div id="nav-link">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="../Recettes/recettes.php">Recettes</a></li>
                <li><a href="contact.html">Contact</a></li>
                <?php if(isset($_SESSION['nom']) && $_SESSION['role'] === 2): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(!isset($_SESSION['nom'])): ?>
            <div class="connexion">
                <a href="../Connexion/connexion.php">Connexion</a>
            </div>
        <?php else: ?>
            <div class="connexion">
                <a href="../Connexion/connexion.php?logout=1">Déconnexion</a>
            </div>
        <?php endif; ?>
            <div id="icons"></div>
    </div>
    <div class="header">
        <div class="paragraphe">
            <h1>A propos</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard  
            dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently 
            with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="separation1"></div>
        <div class="paragraphe">
            <h1>Mes services</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard  
            dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently 
            with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
    <div class="footer">
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="../Recettes/recettes.php">Recettes</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="mentionLegale.php">Mentions légales</a></li>
            <li><a href="confidentialite.php">Politique de confidentialité</a></li>
        </ul>
        <ul>
            <li><a href="#" class="gg-instagram"></a></li>
            <li><a href="#" class="gg-facebook"></a></li>
            <li><a href="#" class="gg-twitter"></a></li>
        </ul>
        <p>© Copyright 2023P.Pinheiro</p>
    </div>
    <script src="script.js"></script>
</body>
</html>