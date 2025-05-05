<?php

namespace App\Controllers;

class MessagerieController
{
    public function conversations(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/conversations.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

    public function conversation(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/conversation.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

}