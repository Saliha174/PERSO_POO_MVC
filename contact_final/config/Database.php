<?php
namespace Config;

    use PDO;
    use PDOException;

class Database {
    private $host = "localhost";
    private $db_name = "contact_gonesse";
    private $username = "root";
    private $password = "";
    public $pdo;

    public function getConnection(): PDO {
        // $this->pdo = null;
        try {
            $this->pdo = new PDO(dsn: "mysql:host=" . $this->host . ";dbname=" . $this->db_name, username: $this->username, password: $this->password);
            $this->pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion: " . $exception->getMessage();
        }
        return $this->pdo;
    }
}
?>

