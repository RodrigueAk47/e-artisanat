<?php


global $router;

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\LoginController;
use App\Controllers\ComController;
use App\Controllers\ProductsController;
use App\Controllers\ProductController;
use App\Controllers\PanierController;


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