<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.Nutrition</title>
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="shortcut icon" href="../logo.png">
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
            <form action="../Recettes/recettes.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="nom" placeholder="Nom" required>
                <textarea type="text" name="description" placeholder="Description" required></textarea>
                <input type="number" min="0" max="120" name="tpsPreparation" placeholder="Temps de préparation" required>
                <input type="number" min="0" max="120" name="tpsCuisson" placeholder="Temps de cuisson" required>
                <input type="number" min="0" max="120" name="tpsRepos" placeholder="Temps de repos" required>
                <input type="text" name="ingredients" placeholder="Ingredients (séparer les ingédients par une virgule)" required>
                <input type="text" name="etapes" placeholder="Etapes" required>
                <input type="text" name="allergenes" placeholder="Allergènes (sans majuscules)" required>
                <input type="text" name="regime" placeholder="Regimes" required>
                <input type="file" name="image" accept="image/jpeg, image/png" required>
                <button type="submit" name="create" value="upload">Créer</button>
            </form>
            <h2>Ajouter un patient</h2>
            <form action="../DBinscription.php" method="POST">
                <input type="email" name="email" placeholder="Adresse Email du patient" required>
                <input type="text" name="nom" placeholder="Nom de famille du patient" required>
                <input type="text" name="prenom" placeholder="Prénom du patient" required>
                <input type="password" name="password" placeholder="Mot de passe du patient" required>
                <h3>Choisir l'allergène du patient</h3>
                <div class="allergenes">
                <div>
                    <input type="radio" name="allergene" value="gluten" required>
                    <label for="gluten">Gluten</label>
                </div>
                <div>
                    <input type="radio" name="allergene" value="lactose">
                    <label for="lactose">lactose</label>
                </div>
                <div>
                    <input type="radio" name="allergene" value="arachides">
                    <label for="arachides">Arachides</label>
                </div>
            </div>
            <button type="submit" id="newUser">Ajouter le patient</button>
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