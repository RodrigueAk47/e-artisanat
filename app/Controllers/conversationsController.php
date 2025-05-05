<?php

namespace App\Controllers;

class conversationsController
{
    public function converser(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/conversations.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}