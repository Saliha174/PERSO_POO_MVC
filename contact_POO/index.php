<?php
require_once 'config/config.php';
require_once 'classes/Database.php';
require_once __DIR__ . '/classes/Contact.php';

$db = new Database($db_host, $db_name, $db_user, $db_pass);
$pdo = $db->getPdo(); // maintenant tu as l'objet PDO

var_dump($pdo);


$testContact = new Contact("Bob", "bob@test.com", "0700000000");
var_dump($testContact);
