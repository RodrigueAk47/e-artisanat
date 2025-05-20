<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\ProductsModel;

class AuteurController
{
    public function index(string $title)
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
            var_dump($products);
        }
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/auteur.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}