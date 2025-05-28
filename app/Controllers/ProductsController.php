<?php

namespace App\Controllers;
use App\Models\ProductsModel;
use App\Models\CommentsModel;

class ProductsController
{
    public function products_view(string $title)
    {
        session_start();
        if (isset($_GET['category'])) {
            $categoryId = $_GET['category'];


        } else {
            $categoryId = 1; // Default category ID
        }

        $productsModel = new ProductsModel();
        $products = $productsModel->getAllProductsByCategoryId($categoryId);

     
        
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/products_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function product_view(string $title)
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

        $commentsModel = new CommentsModel();
$comments = $commentsModel->getCommentsByProduct($productId);

// Ajouter un commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment']) && isset($_SESSION['user'])) {
    $content = trim($_POST['comment']);
    if ($content !== '') {
        $commentsModel->addComment($_SESSION['user']['id'], $productId, $content);
        header("Location: /product?id=$productId"); // éviter double soumission
        exit;
    }
}

        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/product_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

}