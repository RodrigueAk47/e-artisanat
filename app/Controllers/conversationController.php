<?php

namespace App\Controllers;

class conversationController
{
    public function converser(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/conversation.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}