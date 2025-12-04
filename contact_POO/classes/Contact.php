<?php
// classes/Contact.php

require_once __DIR__ . '/Model.php';

class Contact extends Model
{
    public $nom;
    public $email;

    public $telephone;

    public $createdAt;

    public function __construct($nom, $email, $telephone = null, $createdAt = null)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->createdAt = $createdAt;
    }
}
