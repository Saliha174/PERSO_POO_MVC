<?php

namespace Controllers;

use Models\Contact;

class ContactController
{

    public object $contacts;

    public function __construct()
    {
        $this->contacts = new Contact();
    }

    public function addContactController()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
        }
        $this->contacts->addContact($name, $email, $phone);
        // if ($this->contacts->addContact($name, $email, $phone)) {
        //     echo "Contact ajouté avec succès.";
        // } else {
        //     echo "Erreur lors de l'ajout du contact.";
        // }
        // !Apres ca la redirection doit ponter vers la PAGE D ENTREE DU SITE DONC VERS INDEX A LA RACINE
        header('location: index.php');
        exit;
        // if ($this->contacts->addContact($name, $email, $phone)) {
        //     echo "Contact ajouté avec succès.";
        // } else {
        //     echo "Erreur lors de l'ajout du contact.";
        // }
    }

    public function getAllController()
    {
        $allContacts = $this->contacts->getAllContact();

        include_once __DIR__ . '/../views/index.php';
    }
}
