<?php


global $router;

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ComController;
use App\Controllers\ProductsController;
use App\Controllers\ProductController;
use App\Controllers\PanierController;
<<<<<<< HEAD
use App\Controllers\MessagerieController;
use App\Controllers\Admins\AdminController;

=======
use App\Controllers\CompteController;
>>>>>>> 47e6dd23dcdc1db5ea81dfa8fe3e99cdb85ad064


$router->get('/', function () {
    (new HomeController())->index(
        'E-Artisanat - Accueil'
    );
});

$router->get('/login', function () {
    (new AuthController())->login(
        'E-Artisanat - Connexion'
    );
});

$router->get('/register', function () {
    (new AuthController())->register(
        'E-Artisanat - Inscription'
    );
});

// Route pour les conversations
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

// Route pour les commandes
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
    (new ProductController())->product(
        'E-Artisanat - commande & négociation'
    );
});

$router->get('/panier', function () {
    (new PanierController())->panier(
        'E-Artisanat - panier'
    );
});

<<<<<<< HEAD
// Admin routes
$router->get('/admin', function () {
    (new AdminController())->index(
        'E-Artisanat - Admin Dashboard'
    );
});

$router->get('/admin/users', function () {
    (new AdminController())->users(
        'E-Artisanat - Admin Users'
    );
});

$router->get('/admin/products', function () {
    (new AdminController())->products(
        'E-Artisanat - Admin Products'
    );
});

$router->get('/admin/orders', function () {
    (new AdminController())->orders(
        'E-Artisanat - Admin Orders'
    );
});
$router->get('/admin/messages', function () {
    (new AdminController())->messages(
        'E-Artisanat - Admin Messages'
    );
});

$router->get('/admin/settings', function () {
    (new AdminController())->settings(
        'E-Artisanat - Admin Settings'
    );
});
=======
$router->get('/compte', function () {
    (new CompteController())->compte(
        'E-Artisanat - compte'
    );
});
>>>>>>> 47e6dd23dcdc1db5ea81dfa8fe3e99cdb85ad064
