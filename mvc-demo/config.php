<?php
// config.php

$db_host = 'localhost';
$db_name = 'mvc_demo';
$db_user = 'root';
$db_pass = ''; // ou 'root' selon ton WAMP

// Construction du DSN
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

try {
    // Création de l'objet PDO
    $pdo = new PDO($dsn, $db_user, $db_pass);

    // Option : afficher les erreurs si problème
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "YESSS connexion okay!!!";
} catch (PDOException $e) {
    // En cas de problème de connexion
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
