<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInscription.css">
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
        <form class="form" action="../DBinscription.php" method="POST">
            <input type="email" placeholder="Adresse mail" name="email" required>
            <input type="text" placeholder="Nom" name="nom" required>
            <input type="text" placeholder="Prenom" name="prenom" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <h3>allergenes</h3>
            <div class="allergenes">
                <div>
                    <input type="radio" name="allergene" value="gluten" required>
                    <label for="gluten">Gluten</label>
                </div>
                <div>
                    <input type="radio" name="allergene" value="lactose">
                    <label for="lactose">Lactose</label>
                </div>
                <div>
                    <input type="radio" name="allergene" value="arachides">
                    <label for="arachides">Arachides</label>
                </div>
            </div>
            <button type="submit" id="inscription">S'inscrire</button>
        </form>
        <a href="connexion.php">Déja inscrit ? Se connecter.</a>
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