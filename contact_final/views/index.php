<?php

// Inclure les classes
//require_once 'config/Database.php';  
// require_once 'models/Contact.php';

//$database = new Database();
// $contact = new Contact();

// Si le formulaire est soumis avec récupération des valeurs, alors on ajoute un nouveau contact
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     // exit();
//     // if ($contact->addContact($name, $email, $phone)) {
//     //     echo "Contact ajouté avec succès.";
//     // } else {
//     //     echo "Erreur lors de l'ajout du contact.";
//     // }
// }
// var_dump($text);
// Récupérer tous les contacts
// $contacts = $contact->getAllContacts();
// include_once realpath(path: __DIR__."/../inc/header.php");


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "hello" ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <h1>Carnet de Contact</h1>

    <h2>Liste des Contacts</h2>
    <ul>

        <?php foreach ($text as $cont): ?>
            <li>
                <?php echo htmlspecialchars(string: $cont['name']); ?> -
                <?php echo htmlspecialchars(string: $cont['email']); ?> -
                <?php echo htmlspecialchars(string: $cont['phone']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Ajouter un nouveau contact</h2>
    <form action="index" method="POST">
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Téléphone" required>
        <button type="submit">Ajouter</button>
    </form>

</body>

</html>