<?php


global $router;

use App\Controllers\HomeController;
use App\Controllers\AuthController;

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

