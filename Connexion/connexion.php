<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleConnexion.css">
    <link rel="shortcut icon" href="../logo.png">
    <title>S.Nutrition</title>
</head>
<body>
    <div id="nav">
        <img src="../logo.png" width="140px" height="140px">
        <h1>Sandrine nutrition</h1>
        <div class="nav-link">
            <ul>
                <li><a href="../Accueil/index.php">Accueil</a></li>
                <li><a href="../Recettes/recettes.php">Recettes</a></li>
                <li><a href="../Accueil/contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <form class="form" action="../Accueil/index.php" method="POST">
            <input type="text" placeholder="Adresse mail" name="email" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <button type="submit" id="connexion" name="connexion">Connexion</button>
        </form>
        <a href="inscription.php">S'inscrire</a>
    </div>
    <div class="footer">
        <ul>
            <li><a href="../Accueil/index.php">Acceuil</a></li>
            <li><a href="../Recettes/recettes.php">Recettes</a></li>
            <li><a href="../Accueil/contact.php">Contact</a></li>
            <li><a href="../Accueil/mentionLegale.php">Mentions légales</a></li>
            <li><a href="../Accueil/confidentialite.php">Politique de confidentialité</a></li>
        </ul>
        <ul>
            <li><a href="#" class="gg-instagram"></a></li>
            <li><a href="#" class="gg-facebook"></a></li>
            <li><a href="#" class="gg-twitter"></a></li>
        </ul>
        <p>© Copyright 2023P.Pinheiro</p>
    </div>
</body>
</html>