<?php

require_once __DIR__ . '/Product.php';

class Food extends Product
{
    protected $calories;

    public function __construct()
    {
        // On appelle le constructeur parent (même s'il est vide pour l'instant)
        parent::__construct();

        // Ici, on fixe la catégorie par défaut pour toutes les Food
        $this->category = 'Food';
    }

    // --- SETTER spécifique ---

    public function setCalories(int $calories): void
    {
        $this->calories = $calories;
    }

    // --- GETTER spécifique ---

    public function getCalories(): int
    {
        return $this->calories;
    }
}
