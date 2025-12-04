<?php

namespace Models;

use Config\Database;
use PDOException;
use PDO;

require_once __DIR__ . "/../config/Database.php";

class Contact
{

    private $pdo;

    public function __construct()
    {
        try {
            $database = new Database();
            $this->pdo = $database->getConnection();
        } catch (PDOException $e) {
            die("Erreur de connexion à la base : " . $e->getMessage());
        }
    }

    // Ajouter un contact
    public function addContact(string $name, string $email, int $phone): bool

    {
        try {
            $query = "INSERT INTO contacts (name, email, phone) 
                      VALUES (:name, :email, :phone)";

            $stmt = $this->pdo->prepare(query: $query);

            $stmt->bindParam(param: ':name', var: $name);
            $stmt->bindParam(param: ':email', var: $email);
            $stmt->bindParam(param: ':phone', var: $phone);

            return $stmt->execute(); // ✔ return true/false
        } catch (PDOException $e) {
            // Log interne ou affichage dev
            echo "Erreur lors de l'ajout du contact : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les contacts
    public function getAllContacts(): array|bool
    {
        try {
            $query = "SELECT * FROM contacts";
            $stmt = $this->pdo->prepare(query: $query);
            $stmt->execute();

            return $stmt->fetchAll(mode: PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des contacts : " . $e->getMessage();
            return false;
        }
    }
}
