<?php

namespace App\Controllers;

class detailcommandeController
{
    public function detailler(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/detailcommande.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}