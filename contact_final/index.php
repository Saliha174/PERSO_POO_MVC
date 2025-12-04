<?php

require 'autoload.php';
// use Controller\BaseController;
use Controller\ContactController;
// require_once realpath(__DIR__."/controller/contactController.php");



$contactconrtoll = new ContactController();
$contactconrtoll->index();

//  $action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Gère l'affichage de la page d'accueil
// if($action === 'list'){
//     $home->index();
//     $contactconrtoll->getAllContactController();
// } 
// if ($action === 'abir'){

//     $contactconrtoll->addContactController();
// }
