<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthentificationController;
use App\Controllers\MedicamentController;
use App\Controllers\VenteEnLigneController;

$router = new Router();

$router->get('/', HomeController::class, 'login');
$router->get('/dashboard', HomeController::class, 'dashboard');
$router->get('/register', HomeController::class, 'register');
$router->get('/medicaments', MedicamentController::class, 'displayMedicaments');
$router->get('/logout', AuthentificationController::class, 'logout');
$router->post('/buy', VenteEnLigneController::class, 'buy');
$router->post('/login', AuthentificationController::class, 'singIn');
$router->post('/register', AuthentificationController::class, 'singUp');






return $router;