<?php 
namespace Controller;

use Controller\BaseController;

class HomeController extends BaseController
{
    // public $contactModel;

    // public function __construct()
    // {
    //     $this->contactModel = new ContactController();
    // }

    // $this->render est une méthode de BaseController pour afficher une vue;
    public function index()
    {

        // Affiche la vue "home" avec un titre
        $this->render('index', ['title' => 'Bienvenue sur notre site']);
    }

    // public function about()
    // {

    //     // Affiche la vue "about" avec un titre
    //     $this->render('about', ['title' => 'À propos de nous']);
    // }

    // public function list()
    // {
    //     $text = $this->contactModel->getAllContactController();
    //     return $this->render('/../views/index.php', ['$text' => $text]);
    // }
}

?>