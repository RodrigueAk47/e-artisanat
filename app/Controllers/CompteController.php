<?php

namespace App\Controllers;

class CompteController
{
    public function Compte(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/compte.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}