<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.Nutrition</title>
    <link rel="stylesheet" href="styleAdmin.css">
</head>
<body>
    <div id="nav">
        <img src="../logo.png" width="140px" height="140px">
        <h1>Sandrine nutrition</h1>
        <div id="nav-link">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="../Recettes/recettes.php">Recettes</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div>
            <div id="icons"></div>
        </div>
    </div>
    <div class="header">
        <div class="admin">
            <h1>Partie administrateur</h1>
            <h2>Créer une recette de cuisine</h2>
            <form action="" method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <textarea type="text" name="description" placeholder="Description" required></textarea>
                <input type="text" name="tpsPreparation" placeholder="Temps de préparation" required>
                <input type="text" name="tpsCuisson" placeholder="Temps de cuisson" required>
                <input type="text" name="tpsRepos" placeholder="Temps de repos" required>
                <input type="text" name="ingredients" placeholder="Ingredients" required>
                <input type="text" name="etapes" placeholder="Etapes" required>
                <input type="text" name="allergenes" placeholder="Allergènes" required>
                <input type="text" name="regime" placeholder="Regimes" required>
                <input type="file" name="image" id="image" accept="image/jpeg, image/png" required>
                <button type="submit" name="create">Créer</button>
            </form>
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