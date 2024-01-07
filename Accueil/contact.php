<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.nutrition</title>
    <link rel="stylesheet" href="styleContact.css">
    <link rel="shortcut icon" href="../logo.png">
</head>
<body>
    <!--Navigation-->
    <div id="nav">
        <img src="../logo.png" width="140px" height="140px">
        <h1>Sandrine nutrition</h1>
        <div id="nav-link">
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="../Recettes/recettes.php">Recettes</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php if(isset($_SESSION['nom']) && $_SESSION['role'] === 2): ?>
                    <li><a href="./admin.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(!isset($_SESSION['nom'])):?>
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
    <!--Contenu-->
    <header>
        <h1>Me contacter</h1>
        <div class="contact">
            <div class="tel">
                <h2>N° de téléphone:</h2>
                <h3>06.50.50.50.50</h3>
            </div>
            <div class="mail">
                <h2>Adresse Email:</h2>
                <h3>sandrineCoupart@mail.com</h3>
            </div>
        </div>
        <div class="horaires">
            <h2>Horaires d'ouverture</h2>
            <ul>
                <li>9h-12h / 13h-18h</li>
                <li>9h-12h / 13h-18h</li>
                <li>9h-12h / 13h-18h</li>
                <li>9h-12h / 13h-18h</li>
                <li>9h-12h / 13h-18h</li>
                <li>9h-12h / 13h-17h</li>
                <li>9h-12h</li>
            </ul>
        </div>
    </header>
    <!--Footer-->
    <div class="footer">
        <ul>
        <li><a href="../index.php">Acceuil</a></li>
            <li><a href="../Recettes/recettes.php">Recettes</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./mentionLegale.php">Mentions légales</a></li>
            <li><a href="./confidentialite.php">Politique de confidentialité</a></li>
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