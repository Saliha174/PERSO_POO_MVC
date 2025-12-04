<?php

require_once __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    public function list()
    {
        $model = new ProductModel();
        $products = $model->getAllProducts();

        require __DIR__ . '/../views/products_list.php';
    }
}
