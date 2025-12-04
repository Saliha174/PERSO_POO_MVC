<?php
// classes/Database.php

class Database
{
    private $pdo;

    public function __construct($host, $name, $user, $pass)
    {
        $dsn = "mysql:host={$host};dbname={$name};charset=utf8mb4";
        $this->pdo = new PDO($dsn, $user, $pass);
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
