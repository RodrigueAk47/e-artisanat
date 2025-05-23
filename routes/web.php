<?php


global $router;

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ComController;
use App\Controllers\ProductsController;
use App\Controllers\PanierController;
use App\Controllers\paiementController;

use App\Controllers\MessagerieController;
use App\Controllers\Admins\AdminController;
use App\Controllers\CompteController;
use App\Controllers\TestController;
use App\Controllers\AuthorController;
use App\Controllers\ManageSessionController;

/**
 * Main Routes
 */

$router->get('/', function () {
    (new HomeController())->index(
        'E-Artisanat - Accueil'
    );
});


/**
 * Formular Routes
 */
$router->get('/login', function () {
    (new AuthController())->login(
        'E-Artisanat - Connexion'
    );
});

$router->post('/login', function () {
    (new AuthController())->login(
        'E-Artisanat - Connexion'
    );
});

$router->get('/register', function () {
    (new AuthController())->register(
        'E-Artisanat - Inscription'
    );
}); 

$router->post('/register', function () {
    (new AuthController())->register(
        'E-Artisanat - Inscription'
    );
}); 

/**
 * Messagerie Routes
 */
$router->get('/conversations', function () {
    (new MessagerieController())->conversations(
        'E-Artisanat - Messagerie'
    );
});

$router->get('/conversation', function () {
    (new MessagerieController())->conversation(
        'E-Artisanat - Messagerie'
    );
});

/**
 * Product Routes
 */
$router->get('/commander', function () {
    (new ComController())->commander(
        'E-Artisanat - Commande'
    );
});

$router->get('/products', function () {
    (new ProductsController())->products(
        'E-Artisanat - production'
    );
});

$router->get('/product', function () {
    (new ProductsController())->product(
        'E-Artisanat - commande & négociation'
    );
});

$router->get('/panier', function () {
    (new PanierController())->panier(
        'E-Artisanat - panier'
    );
});



$router->get('/payer', function () {
    (new paiementController())->payer(
        'E-Artisanat - paiement'
    );
});

/**
 * Admin Routes
 */
$router->get('/admin', function () {
    (new AdminController())->admin_dashboard_view(
        'E-Artisanat - Admin Dashboard'
    );
});

$router->get('/admin/users', function () {
    (new AdminController())->admin_users_view(
        'E-Artisanat - Admin Users'
    );
});

$router->get('/admin/products', function () {
    (new AdminController())->admin_products_view(
        'E-Artisanat - Admin Products'
    );
});

$router->get('/admin/orders', function () {
    (new AdminController())->admin_orders_view(
        'E-Artisanat - Admin Orders'
    );
});


$router->get('/admin/settings', function () {
    (new AdminController())->admin_settings_view(
        'E-Artisanat - Admin Settings'
    );
});

/**
 * User Routes
 */
$router->get('/compte', function () {
    (new CompteController())->compte(
        'E-Artisanat - compte'
    );
});

$router->get('/modifier-profil', function () {
    (new CompteController())->Modifier_profil(
        'E-Artisanat - Modifier Profil'
    );
});
$router->post('/modifier-profil', function () {
    (new CompteController())->Modifier_profil(
        'E-Artisanat - Modifier Profil'
    );
});

// Author Routes
$router->get('/author', function () {
    (new AuthorController())->author_view_guest(
        'E-Artisanat - Auteur'
    );
});

$router->get('/author/dashboard', function () {
    (new AuthorController())->author_dashboard_view(
        'E-Artisanat - Tableau de bord Auteur'
    );
});

$router->get('/author/products', function () {
    (new AuthorController())->author_products_view(
        'E-Artisanat - Produits Auteur'
    );
});
$router->get('/author/orders', function () {
    (new AuthorController())->author_orders_view(
        'E-Artisanat - Commandes Auteur'
    );
});
$router->get('/author/settings', function () {
    (new AuthorController())->author_settings_view(
        'E-Artisanat - Paramètres Auteur'
    );
});



$router->get('/test', function () {
    (new TestController())->index(
        'E-Artisanat - Test'
    );
});

// Manager Session Routes 
$router->get('/deconnexion', function () {
    (new ManageSessionController())->logout(
        'E-Artisanat - Deconnexion'
    );
});



