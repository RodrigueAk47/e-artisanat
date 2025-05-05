<?php


global $router;

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\LoginController;
use App\Controllers\ComController;
use App\Controllers\ProductsController;


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
