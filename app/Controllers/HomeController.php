<?php

namespace App\Controllers;

class HomeController
{
    public function index(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/welcome.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}