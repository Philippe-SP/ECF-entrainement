<?php

$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

try {
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtPostAvis = $pdo->prepare('INSERT INTO commentaires (note, commentaire, id_recette) VALUES (:note, :commentaire, :idRecette)');
    $stmtPostAvis->bindParam(':note', $_POST['note']);
    $stmtPostAvis->bindParam(':commentaire', $_POST['com']);
    $stmtPostAvis->bindParam(':idRecette', $_POST['recetteID']);
    if($stmtPostAvis->execute()) {
        header('Content-Type: application/json');
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion a la base de données" . $e->getMessage();
    header('Content-Type: application/json');
    echo json_encode(["error" => $e->getMessage()]);
}
?>

