On fait un zoom-out :

Navigateur → http://localhost/mvc-poo/

WAMP/Apache → lance index.php

index.php

charge ProductController.php

crée $controller = new ProductController();

appelle $controller->list();

ProductController::list()

charge ProductModel.php (+ entités)

crée $model = new ProductModel();

appelle $products = $model->getAllProducts();

ProductModel::getAllProducts()

crée Product, Food, Dessert (objets)

les ajoute dans un tableau $products

return $products; vers le controller

De retour dans list()

on fait require 'views/products_list.php';

products_list.php

reçoit $products (tableau d’objets)

boucle dessus

appelle getName(), getPrice(), getCategory(), éventuellement getCalories()

écrit du HTML

Le serveur renvoie ce HTML → ton navigateur l’affiche.