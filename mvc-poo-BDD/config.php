<?php
// config.php

$db_host = 'localhost';
$db_name = 'mvc_poo';
$db_user = 'root';
$db_pass = ''; // ou 'root' selon ta config WAMP

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "YOUPIIII CA MARCHE!!!!";
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
