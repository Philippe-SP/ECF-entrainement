<?php
session_start();
/*details-recette.php?id=<?php echo $recetteID ?>*/

$dsn = 'mysql:host=mysql-pinheiro.alwaysdata.net;dbname=pinheiro_sandrinenutrition';
$username = 'pinheiro_sn';
$pass = 'Philippe_SN';

//Requette PDO pour l'affichage du detail de la recette
try {
    $pdo = new PDO($dsn, $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Requette SQL pour les recettes
    $recetteID = $_GET['id'];

    $stmt = $pdo->prepare('SELECT * FROM recettes WHERE id = :id');
    $stmt->bindParam(':id', $recetteID);
    $stmt->execute();
    $detail = $stmt->fetch(PDO::FETCH_ASSOC);
    $array = preg_split('/[,]/', $detail['ingredients']);
    //avis
    $stmtAvis = $pdo->prepare('SELECT * FROM commentaires WHERE id_recette = :idRecette');
    $stmtAvis->bindParam(':idRecette', $recetteID);
    $stmtAvis->execute();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion a la base de données" . $e->getMessage();
}
if(isset($_POST['poster'])) {
    var_dump($_POST['note']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.Nutrition</title>
    <link rel="stylesheet" href="styleDetails.css">
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
                <li><a href="./recettes.php">Recettes</a></li>
                <li><a href="../Accueil/contact.php">Contact</a></li>
                <?php if (isset($_SESSION['nom']) && $_SESSION['role'] === 2) : ?>
                    <li><a href="../Accueil/admin.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if (!isset($_SESSION['nom'])) : ?>
            <div class="connexion">
                <a href="../Connexion/connexion.php">Connexion</a>
            </div>
        <?php else : ?>
            <div class="connexion">
                <a href="../Connexion/connexion.php?logout=1">Déconnexion</a>
            </div>
        <?php endif; ?>
        <div id="icons"></div>
    </div>
    <!--Contenu-->
    <div class="header">
        <div class="content">
            <img src="../images/<?php echo $detail['image']; ?>">
            <ul>
                <?php echo "<li>Temps de préparation: " . $detail['tpsPreparation'] . "min</li>"; ?>
                <?php echo "<li>Temps de cuisson: " . $detail['tpsCuisson'] . "min</li>"; ?>
                <?php echo "<li>Temps de repos: " . $detail['tpsRepos'] . "min</li>"; ?>
            </ul>
        </div>
        <?php echo "<h1>Tarte rustique aux champignons, comté et pesto</h1>"; ?>
        <h2>Description:</h2>
        <?php echo "<p>" . $detail['description'] . "</p>"; ?>
        <h2>Ingrédients:</h2>
        <?php echo '<ul>';
        foreach ($array as $value) {
            echo "<li>" . $value . "</li>";
        }
        echo '</ul>'; ?>
        <h2>Etapes:</h2>
        <?php echo "<p>" . $detail['etapes'] . "</p>"; ?>
        <h2>Allergenes:</h2>
        <?php echo "<p>" . $detail['allergene'] . "</p>"; ?>
        <h2>Régimes:</h2>
        <?php echo "<p>" . $detail['regime'] . "</p>"; ?>
        <div id="avis">
            <h2>Avis des patients:</h2>
            <?php while($avis = $stmtAvis->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="com">
                <h3>Note: <?php 
                            if($avis['note'] === 1) {
                                echo "&#9734;";
                            }else if($avis['note'] === 2) {
                                echo "&#9734;"."&#9734;";
                            }else if($avis['note'] === 3) {
                                echo "&#9734;"."&#9734;"."&#9734;";
                            }else if($avis['note'] === 4) {
                                echo "&#9734;"."&#9734;"."&#9734;"."&#9734;";
                            }else if($avis['note'] === 5) {
                                echo "&#9734;"."&#9734;"."&#9734;"."&#9734;"."&#9734;";
                            }
                ?></h3>
                <h3>Commentaire: <span><?php echo $avis['commentaire']; ?></span></h3>
            </div>
            <?php }; ?>
        </div>
        <div id="avisPosted" class="com">
            <h3>Note: <span id="notePosted"></span></h3>
            <h3>Commentaire: <span id="comPosted"></span></h3>
        </div>
        <?php if(isset($_SESSION['nom'])) { ?>
        <div id="avisForm">
            <h2>Laisser un avis.</h2>
            <form id="form" method="POST" enctype="multipart/form-data">
                <input hidden type ="number" name="recetteID" id="recetteID" value="<?php echo $recetteID; ?>">
                <input type="number" name="note" id="note" min="0" max="5" placeholder="Entrez une note de 0 à 5" required>
                <textarea name="com" id="com" placeholder="Ecrivez votre commentaire ici." required></textarea>
                <button type="submit" id="post" name="poster">Poster!</button>
            </form>
        </div>
        <?php }; ?>
    </div>
    <!--Footer-->
    <div class="footer">
        <ul>
            <li><a href="../index.php">Acceuil</a></li>
            <li><a href="./recettes.php">Recettes</a></li>
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