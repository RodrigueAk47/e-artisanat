<?php

namespace App\Controllers;

class PanierController
{
    public function panier(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/panier.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}