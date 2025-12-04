Navigateur → http://localhost/mvc-poo/
        |
        V
WAMP/Apache lance index.php
        |
        V
index.php
    charge ProductController.php
    crée un ProductController
    appelle → ProductController::list()
        |
        V
ProductController::list()
    charge ProductModel.php
    crée un ProductModel
    appelle → ProductModel::getAllProducts()
        |
        V
ProductModel::getAllProducts()

    → crée un objet Dessert()
         |
         V
       $d1 = new Dessert()
           (le constructeur met $category = "Dessert")

    → remplit l'objet avec les setters :
         $d1->setName("Tiramisu")
         $d1->setPrice(5.50)
         $d1->setCalories(450)

    → ajoute l'objet au tableau $products[] :
         $products[] = $d1

    → renvoie le tableau complet :
         return $products
        |
        V
ProductController::list()
    reçoit le tableau $products
    appelle la vue :
    require views/products_list.php
        |
        V
views/products_list.php

    boucle sur chaque $product dans le tableau
    arrive à l'objet Tiramisu ($d1)

    → affiche :
        getName()      → "Tiramisu"
        getPrice()     → 5.50
        getCategory()  → "Dessert"
        getCalories()  → 450 (kcal)

        formate ça en HTML dans un <li>...</li>
        |
        V
HTML généré pour Tiramisu :
    <li>
        <strong>Tiramisu</strong> - 5,50 € (catégorie : Dessert) - 450 kcal
    </li>

        |
        V
Navigateur reçoit ce HTML
        |
        V
Le Tiramisu s’affiche à l’écran 🎉
