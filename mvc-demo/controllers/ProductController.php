<?php
// controllers/ProductController.php

require_once __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    private $pdo;

    // Le contrôleur reçoit le PDO à la création
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function list()
    {
        // 1) Créer le modèle en lui donnant le PDO
        $model = new ProductModel($this->pdo);

        // 2) Récupérer les produits depuis la BDD
        $products = $model->getAllProducts();

        // 3) Afficher la vue
        require __DIR__ . '/../views/products_list.php';
    }
}
