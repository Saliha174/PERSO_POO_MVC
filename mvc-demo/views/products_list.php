<!-- views/products_list.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>

<body>
    <h1>Liste des produits</h1>

    <p><a href="index.php?page=home">Retour à l'accueil</a></p>

    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= htmlspecialchars($product['name']) ?>
                - <?= number_format($product['price'], 2, ',', ' ') ?> €
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>