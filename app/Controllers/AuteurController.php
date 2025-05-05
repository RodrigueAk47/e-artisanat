<?php

namespace App\Controllers;

class AuteurController
{
    public function index(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/auteur.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}