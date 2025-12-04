<?php
include_once __DIR__ . '/../inc/header.php';



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <h1>Carnet de Contact</h1>

    <h2>Liste des Contacts</h2>
    <ul>
        <?php foreach ($allContacts as $cont): ?>
            <li>
                <?php echo htmlspecialchars($cont['name']); ?> -
                <?php echo htmlspecialchars($cont['email']); ?> -
                <?php echo htmlspecialchars($cont['phone']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Ajouter un nouveau contact</h2>
    <form action="index.php" method="POST">
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Téléphone" required>
        <button type="submit">Ajouter</button>
    </form>
    <?php
    include_once __DIR__ . '/../inc/footer.php';

    ?>
</body>

</html>