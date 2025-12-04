<?php

require_once __DIR__ . '/Product.php';

class Food extends Product
{
    protected int $calories;

    public function __construct()
    {
        parent::__construct();
        $this->category = 'Food';
    }

    public function setCalories(int $calories): void
    {
        $this->calories = $calories;
    }

    public function getCalories(): int
    {
        return $this->calories;
    }
}
