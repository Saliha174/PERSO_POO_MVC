<?php

require_once __DIR__ . '/Food.php';

class Dessert extends Food
{
    public function __construct()
    {
        // Appelle le constructeur de Food (qui met category = 'Food')
        parent::__construct();

        // On écrase la catégorie pour la spécialiser à "Dessert"
        $this->category = 'Dessert';
    }
}
