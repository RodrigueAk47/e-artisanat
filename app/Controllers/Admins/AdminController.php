<?php

namespace App\Controllers\Admins;

class AdminController
{
    public function index(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/header.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/sidebar.php';
        require_once __DIR__ . '/../../Views/administrateurs/dashboard.php';
        require_once __DIR__ . '/../../Views/layouts/footer.php';
    }

    public function users(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/header.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/sidebar.php';
        require_once __DIR__ . '/../../Views/administrateurs/users/users.php';
        require_once __DIR__ . '/../../Views/layouts/footer.php';
    }
    public function products(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/header.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/sidebar.php';
        require_once __DIR__ . '/../../Views/administrateurs/products/products.php';
        require_once __DIR__ . '/../../Views/layouts/footer.php';
    }
    public function orders(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/header.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/sidebar.php';
        require_once __DIR__ . '/../../Views/administrateurs/orders/orders.php';
        require_once __DIR__ . '/../../Views/layouts/footer.php';
    }
    public function messages(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/header.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/sidebar.php';
        require_once __DIR__ . '/../../Views/administrateurs/messages/messages.php';
        require_once __DIR__ . '/../../Views/layouts/footer.php';
    }
    public function settings(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/header.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/sidebar.php';
        require_once __DIR__ . '/../../Views/administrateurs/settings/settings.php';
        require_once __DIR__ . '/../../Views/layouts/footer.php';
    }
}
