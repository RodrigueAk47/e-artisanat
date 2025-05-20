<?php

namespace App\Controllers;
use App\Models\ProductsCategoriesModel;

class HomeController
{
    public function index(string $title)
    {
        session_start();

        $products_categories = new ProductsCategoriesModel();
        $categories = $products_categories->getAllproducts_categories();
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/welcome.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}