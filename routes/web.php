<?php


global $router;

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\LoginController;

$router->get('/', function () {
    (new HomeController())->index(
        'E-Artisanat - Accueil'
    );
});

$router->get('/login', function () {
    (new LoginController())->login(
        'Connexion'
    );
});
