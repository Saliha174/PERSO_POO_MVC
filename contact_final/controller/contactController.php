<?php

namespace Controller;

use models\Contact;
use Controller\BaseController;
// require_once realpath(__DIR__."/../models/Contact.php");

class ContactController extends baseController
{
    public $contacts;

    public function __construct()
    {
        $this->contacts = new Contact();
    }

    public function index()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
            // public function addContactController(): bool
            // {
            // include_once realpath(__DIR__."/../views/index.php");

            $this->contacts->addContact($_POST['name'], $_POST['email'], $_POST['phone']);
            header('Location:index.php');

            exit;
        }

        // public function getAllContactController()
        // {
        $text = $this->contacts->getAllContacts();
        $this->render('index', ['text' => $text]);
        // var_dump($text);
        // include_once realpath(__DIR__ . "/../views/index.php");
        // var_dump($text);
        // return $text;

    }
}
