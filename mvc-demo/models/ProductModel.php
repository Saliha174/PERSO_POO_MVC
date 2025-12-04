<?php
// models/ProductModel.php

class ProductModel
{
    private $pdo;

    // Le modèle reçoit le PDO à sa création
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Méthode qui va vraiment lire la BDD
    public function getAllProducts()
    {
        // 1) Écrire la requête SQL
        $sql = "SELECT id, name, price FROM products";

        // 2) Envoyer la requête à MySQL
        $stmt = $this->pdo->query($sql);

        // 3) Récupérer toutes les lignes sous forme de tableau associatif
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 4) Retourner ces données
        return $products;
    }
}
