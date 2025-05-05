<?php

namespace App\Controllers;

class mescommandesController
{
    public function commander(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/mescommandes.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}