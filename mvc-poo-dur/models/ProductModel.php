<?php

require_once __DIR__ . '/../entities/Product.php';
require_once __DIR__ . '/../entities/Food.php';
require_once __DIR__ . '/../entities/Dessert.php';

class ProductModel
{
    /**
     * Retourne un tableau d'objets (Product, Food, Dessert)
     */
    public function getAllProducts(): array
    {
        $products = [];

        // --- Produit générique ---
        $p1 = new Product();
        $p1->setName('Stylo');
        $p1->setPrice(1.50);
        $p1->setCategory('Stationery');
        $products[] = $p1;

        // --- Nourriture (Food) ---
        $f1 = new Food();
        $f1->setName('Sandwich');
        $f1->setPrice(4.20);
        $f1->setCalories(350);
        $products[] = $f1;

        $f2 = new Food();
        $f2->setName('Pizza');
        $f2->setPrice(8.90);
        $f2->setCalories(900);
        $products[] = $f2;

        // --- Desserts ---
        $d1 = new Dessert();
        $d1->setName('Tiramisu');
        $d1->setPrice(5.50);
        $d1->setCalories(450);
        $products[] = $d1;

        $d2 = new Dessert();
        $d2->setName('Glace vanille');
        $d2->setPrice(3.80);
        $d2->setCalories(250);
        $products[] = $d2;

        return $products;
    }
}
