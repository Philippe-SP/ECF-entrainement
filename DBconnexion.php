<?php

$dsn = 'mysql:host=localhost;dbname=sandrinenutrition';
$username = 'root';

try{
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo 'Erreur de connexion à la base de données : '. $e->getMessage();
};