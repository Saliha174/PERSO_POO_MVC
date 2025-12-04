<?php

require_once __DIR__ . '/Food.php';

class Dessert extends Food
{
    public function __construct()
    {
        parent::__construct();
        $this->category = 'Dessert';
    }
}
