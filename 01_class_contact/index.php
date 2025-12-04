<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controllers/ContactController.php';
require_once __DIR__ . '/models/Contact.php';
// ! Sans ces trois lignes les namespace ne peuvent pas fonctionner

use Controllers\ContactController;

$contactController = new ContactController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactController->addContactController();
} else {
    $contactController->getAllController();
}
