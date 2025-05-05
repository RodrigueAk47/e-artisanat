<?php

namespace App\Controllers;

class paiementController
{
    public function payer(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/paiement.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}