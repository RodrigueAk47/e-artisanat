<?php

namespace App\Controllers;

class ComController
{
    public function commander (string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/commander.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}