<?php

namespace App\Controllers;

class ProductsController
{
    public function products(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/products.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}