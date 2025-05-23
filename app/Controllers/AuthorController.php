<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\ProductsModel;

class AuthorController
{
    public function author_view_guest(string $title)
    {
        session_start();
        if (isset($_GET['id'])) {
            $autorId = $_GET['id'];
            $authorModel = new AuthorModel();
            $user = $authorModel->get_user_by_id($autorId);
            
            $author = $authorModel->get_author_by_id($autorId);
        
            $keywords = $author['key_words'];
            // Convert string(17) "{Bijoux,Qualité}" to array ['Bijoux', 'Qualité']
            $keywords = trim($keywords, '{}');
            $keywordsArray = array_map('trim', explode(',', $keywords));
            

            $productsModel = new ProductsModel();
            $products = $productsModel->get($_GET['id']);
        }
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/authors/author_view_guest.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

    public function author_dashboard_view(string $title)
    {
        session_start();
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/author_dashboard_view.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }


    public function author_products_view(string $title)
    {
        session_start();
        $productsModel = new ProductsModel();
        $products = $productsModel->getAllProductsAndCategoriesByAuthorId($_SESSION['user']['id']);
        
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/products/author_products_view.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
    public function author_orders_view(string $title)
    {
        session_start();
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/orders/author_orders_view.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
    public function author_settings_view(string $title)
    {
        session_start();
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/settings/author_settings_view.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

}