<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class ProductsController
{
    public function products(string $title)
    {
        session_start();
        if (isset($_GET['category'])) {
            $categoryId = $_GET['category'];


        } else {
            $categoryId = 1; // Default category ID
        }

        $productsModel = new ProductsModel();
        $products = $productsModel->getAllProductsByCategoryId($categoryId);

     
        
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/products.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

    public function product(string $title)
    {
        session_start();
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $productsModel = new ProductsModel();
            $product = $productsModel->getProductById($productId);
            if (!$product) {
                header('Location: /');
                exit;
            }
            $authors = $productsModel->getAuthorNameAndIdByProductId($productId);
            
        } else {

            header('Location: /');
            exit;
        }
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/product.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

}