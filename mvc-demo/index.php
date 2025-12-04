<?php
// index.php

// 0) Charger la config → crée la variable $pdo
require_once __DIR__ . '/config.php';

// 1) On lit le paramètre "page"
$page = $_GET['page'] ?? 'home';

// 2) On choisit quoi faire
switch ($page) {
    case 'products':
        require_once __DIR__ . '/controllers/ProductController.php';

        // On passe le PDO au contrôleur
        $controller = new ProductController($pdo);
        $controller->list();
        break;

    case 'home':
    default:
        echo "<h1>Accueil</h1>";
        echo "<p><a href='?page=products'>Voir les produits</a></p>";
        break;
}
