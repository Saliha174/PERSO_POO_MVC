<?php

require_once __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    private $pdo;

    // Le contrôleur reçoit le PDO une seule fois
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function list()
    {
        // 1) On crée le modèle en lui passant le PDO
        $model = new ProductModel($this->pdo);

        // 2) On lui demande tous les produits (objets)
        $products = $model->getAllProducts();

        // 3) On charge la vue
        require __DIR__ . '/../views/products_list.php';
    }
}
