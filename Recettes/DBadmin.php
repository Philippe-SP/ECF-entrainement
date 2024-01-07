<?php
$dsn = 'mysql:host=mysql-pinheiro.alwaysdata.net;dbname=pinheiro_sandrinenutrition';
$username = 'pinheiro_sn';
$pass = 'Philippe_SN';

$formImg = $_FILES['image']['name'];
$tmpImg = $_FILES['image']['tmp_name'];
//stockage de l'image
move_uploaded_file($tmpImg, "../images/". $formImg);

try{
    $pdo = new PDO($dsn, $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Données du formulaire
    $formNom = $_POST['nom'];
    $formDesc = $_POST['description'];
    $formTpsPrep = $_POST['tpsPreparation'];
    $formTpsCuis = $_POST['tpsCuisson'];
    $formTpsRepos = $_POST['tpsRepos'];
    $formIngr = $_POST['ingredients'];
    $formEtapes = $_POST['etapes'];
    $formAllergenes = $_POST['allergenes'];
    $formRegime = $_POST['regime'];
    //Création de la recette dans la base de donnée
    $stmt = $pdo->prepare('INSERT INTO recettes(nom, description, tpsPreparation, tpsCuisson, tpsRepos, ingredients, etapes, allergene, regime, image) VALUES (:nom, :description, :tpsPreparation, :tpsCuisson, :tpsRepos, :ingredients, :etapes, :allergenes, :regime, :image)');
    $stmt->bindParam(':nom', $formNom);
    $stmt->bindParam(':description', $formDesc);
    $stmt->bindParam(':tpsPreparation', $formTpsPrep);
    $stmt->bindParam(':tpsCuisson', $formTpsCuis);
    $stmt->bindParam(':tpsRepos', $formTpsRepos);
    $stmt->bindParam(':ingredients', $formIngr);
    $stmt->bindParam(':etapes', $formEtapes);
    $stmt->bindParam(':allergenes', $formAllergenes);
    $stmt->bindParam(':regime', $formRegime);
    $stmt->bindParam(':image', $formImg);
    // Actions une fois la recette créée
    if($stmt->execute()) {
    } else {
        echo "Erreur lors de la création de la recette";
    };
} catch(PDOException $e){
    echo "Erreur lors de connection à la base de donnée". $e->getMessage();
};
?>