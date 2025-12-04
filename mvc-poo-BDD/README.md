Navigateur → http://localhost/mvc-poo-BDD/
        |
        V
Serveur Apache (WAMP)
        |
        V
index.php  (POINT D’ENTRÉE)
   |
   +-- charge config.php → crée $pdo (connexion BDD)
   |
   +-- charge ProductController.php
   |
   +-- $controller = new ProductController($pdo)
   |
   +-- $controller->list()
        |
        V
ProductController::list()
    |
    +-- $model = new ProductModel($this->pdo)
    |
    +-- $products = $model->getAllProducts()
            |
            V
        ProductModel::getAllProducts()
            |
            +-- requête SQL : SELECT * FROM products
            |
            +-- foreach ($row as une ligne SQL)
            |        |
            |        +-- si type = 'product' → new Product()
            |        |
            |        +-- si type = 'food' → new Food()
            |        |
            |        +-- si type = 'dessert' → new Dessert()
            |
            +-- setters :
                   setName(), setPrice(), setCategory()
                   setCalories() (si Food/Dessert)
            |
            +-- $products[] = objet (stock dans un tableau)
            |
            +-- return $products  ← tableau d’objets POO
        |
        V
ProductController::list()
    |
    +-- require 'views/products_list.php'
          (la vue reçoit la variable $products)
        |
        V
Vue : products_list.php
    |
    ∟ foreach ($products as $product)
          |
          +-- getName()
          +-- getPrice()
          +-- getCategory()
          +-- getCalories() (si existe)
          |
          +-- construit du HTML <li>...</li>
        |
        V
Navigateur reçoit le HTML
        |
        V
🎉 AFFICHAGE DES PRODUITS À L’ÉCRAN 🎉
