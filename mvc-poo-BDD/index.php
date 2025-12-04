<?php

// 1) On charge la config → crée $pdo
require_once __DIR__ . '/config.php';

// 2) On charge le contrôleur
require_once __DIR__ . '/controllers/ProductController.php';

// 3) On crée le contrôleur en lui donnant le PDO
$controller = new ProductController($pdo);

// 4) On demande au contrôleur d'afficher la liste
$controller->list();
