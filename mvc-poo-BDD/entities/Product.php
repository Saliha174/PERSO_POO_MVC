<?php

class Product
{
    // On protège les propriétés
    protected $name;
    protected $price;
    protected $category;

    // 👉 Constructeur VIDE (ou presque)
    public function __construct()
    {
        // On pourrait mettre une catégorie par défaut ici si on veut
        // $this->category = 'Product';
    }

    // --- SETTERS ---

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    // --- GETTERS ---

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}
