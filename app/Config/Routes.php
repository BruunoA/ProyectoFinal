<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('classificacio', 'ClassificacioController::index');
$routes->get('galeria', 'GaleriaController::index');
$routes->get('contacte', 'ContacteController::index');
$routes->get('programes', 'ProgramesController::index');

