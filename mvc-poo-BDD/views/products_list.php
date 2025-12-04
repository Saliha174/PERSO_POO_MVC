<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des produits (POO + MVC)</title>
</head>

<body>
    <h1>Liste des produits (POO + MVC)</h1>

    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <strong><?= htmlspecialchars($product->getName()) ?></strong>
                - <?= number_format($product->getPrice(), 2, ',', ' ') ?> €
                (catégorie : <?= htmlspecialchars($product->getCategory()) ?>)

                <?php if (method_exists($product, 'getCalories')): ?>
                    - <?= $product->getCalories() ?> kcal
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>