<?php
session_start();

$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

if(isset($_POST['create'])) {
    require_once "../Recettes/DBadmin.php";
};

try{
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Requette pour récupérer les recettes
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
    <link rel="shortcut icon" href="../logo.png">
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
                <?php if(isset($_SESSION['nom']) && $_SESSION['role'] === 2): ?>
                    <li><a href="../Accueil/admin.php">Admin</a></li>
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
    <div class="header">
        <h1>Mes recettes</h1>
        <div class="main">
            <?php 
            while($recette = $stmtRecette->fetch(PDO::FETCH_ASSOC)){
                if(isset($_SESSION['nom'])){
                    if($recette['allergene'] != $_SESSION['allergene']){
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
                        <a id="info" href='details-recette.php?id=<?php echo $recette['id']; ?>'>Informations</a>
                    </div>
                </div>
            </div>
            <?php }} else{
                        if($recette['id'] === 2 || $recette['id'] === 4 || $recette['id'] === 5){ 
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
                        <a id="info" href='details-recette.php?id=<?php echo $recette['id']; ?>'>Informations</a>
                    </div>
                </div>
            </div>
            <?php }}}; ?>
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