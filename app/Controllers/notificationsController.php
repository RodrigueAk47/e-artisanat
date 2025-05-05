<?php

namespace App\Controllers;

class notificationsController
{
    public function notifier(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/notifications.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}