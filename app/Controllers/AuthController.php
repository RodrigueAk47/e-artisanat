<?php

namespace App\Controllers;


class AuthController
{
    public function login(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/forms/login.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

    public function register(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/forms/register.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}