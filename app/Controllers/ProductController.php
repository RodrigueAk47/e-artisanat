<?php

namespace App\Controllers;

class ProductController
{
    public function product(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/product.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}