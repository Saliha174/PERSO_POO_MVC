<?php

require_once __DIR__ . '/../entities/Product.php';
require_once __DIR__ . '/../entities/Food.php';
require_once __DIR__ . '/../entities/Dessert.php';

class ProductModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Lit la BDD, crée les bons objets (Product, Food, Dessert)
     * et retourne un tableau d'objets
     */
    public function getAllProducts(): array
    {
        $products = [];

        // 1) On récupère toutes les lignes de la table products
        $sql = "SELECT id, name, price, type, category, calories FROM products";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 2) Pour chaque ligne, on crée le bon type d'objet
        foreach ($rows as $row) {

            // Choix de la classe selon la colonne "type"
            if ($row['type'] === 'dessert') {
                $obj = new Dessert();
            } elseif ($row['type'] === 'food') {
                $obj = new Food();
            } else {
                $obj = new Product();
            }

            // 3) On remplit l'objet avec les setters de base
            $obj->setName($row['name']);
            $obj->setPrice((float) $row['price']);

            // Pour Product (type "product"), on utilise la catégorie de la BDD
            // Pour Food/Dessert, la catégorie est déjà fixée par le constructeur
            if ($row['type'] === 'product' && !empty($row['category'])) {
                $obj->setCategory($row['category']);
            }

            // Si la colonne calories est remplie, et que l'objet a setCalories()
            if ($row['calories'] !== null && method_exists($obj, 'setCalories')) {
                $obj->setCalories((int) $row['calories']);
            }

            // 4) On ajoute l'objet dans le tableau
            $products[] = $obj;
        }

        return $products;
    }
}
