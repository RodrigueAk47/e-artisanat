<?php

namespace App\Controllers\Admins;

class AdminController
{
    public function admin_dashboard_view(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/admin_sidebar_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_dashboard_view.php';
        require_once __DIR__ . '/../../Views/layouts/layouts_footer_part.php';
    }

    public function admin_users_view(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/admin_sidebar_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/users/admin_users_view.php';
        require_once __DIR__ . '/../../Views/layouts/layouts_footer_part.php';
    }
    public function admin_products_view(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/admin_sidebar_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/products/admin_products_view.php';
        require_once __DIR__ . '/../../Views/layouts/layouts_footer_part.php';
    }
    public function admin_orders_view(string $title)    
    {
        require_once __DIR__ . '/../../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/admin_sidebar_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/orders/admin_orders_view.php';
        require_once __DIR__ . '/../../Views/layouts/layouts_footer_part.php';
    }
    public function admin_settings_view(string $title)
    {
        require_once __DIR__ . '/../../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/admin_layouts/admin_sidebar_part.php';
        require_once __DIR__ . '/../../Views/administrateurs/settings/admin_settings_view.php';
        require_once __DIR__ . '/../../Views/layouts/layouts_footer_part.php';
    }
}
