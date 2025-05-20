<?php

namespace App\Controllers;

class TestController
{
    public function index(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ .'/../Views/test/test.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}