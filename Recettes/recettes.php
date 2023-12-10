<?php
$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

if(isset($_POST['create'])) {
    require_once "../Recettes/DBadmin.php";
};

try{
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmtRecette = $pdo->prepare('SELECT * FROM recettes');
    $stmtRecette->execute();
} catch(PDOException $e){
    echo 'Erreur lors du SELECT'. $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.Nutrition</title>
    <link rel="stylesheet" href="styleRecettes.css">
</head>
<body>
    <!--Navigation-->
    <div id="nav">
        <img src="../logo.png" width="140px" height="140px">
        <h1>Sandrine nutrition</h1>
        <div id="nav-link">
            <ul>
                <li><a href="../Accueil/index.php">Accueil</a></li>
                <li><a href="recettes.php">Recettes</a></li>
                <li><a href="../Accueil/contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="connexion">
            <a href="../Connexion/connexion.html">Connexion</a>
            <div id="icons"></div>
        </div>
    </div>
    <!--Contenu-->
    <div class="header">
        <h1>Mes recettes</h1>
        <div class="main">
            <?php 
            while($recette = $stmtRecette->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="card">
                <div class="card-top">
                    <img src="../images/<?php echo $recette['image']; ?>">
                </div>
                <div class="card-content">
                    <?php echo "<h2>".$recette['nom']."</h2>"; ?>
                    <br>
                    <?php echo "<p>Temps de préparation: ".$recette['tpsPreparation']."min</p>"; ?>
                    <br>
                    <?php echo "<p>Temps de cuisson: ".$recette['tpsCuisson']."min</p>"; ?>
                    <div class="card-bottom">
                        <button type="button" class="info-btn">Informations</button>
                    </div>
                </div>
            </div>
            <?php }; ?>
        </div>
    </div>
    <!--Footer-->
    <div class="footer">
        <ul>
            <li><a href="../Accueil/index.php">Acceuil</a></li>
            <li><a href="recettes.php">Recettes</a></li>
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
    <script src="scriptRecettes.js"></script>
</body>
</html>