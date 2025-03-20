<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'IndexController::home');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('classificacio', 'ClassificacioController::index');
$routes->get('galeria', 'GaleriaController::index');
$routes->get('noticies', 'NoticiesController::index');
$routes->get('programes', 'ProgramesController::index');
$routes->get('contacte', 'ContacteController::index');
$routes->get('sobrenosaltres', 'SobreNosaltresController::index');
$routes->get('dades', 'ClassificacioController::obtenirDades');

// GESTIO
$routes->get('gestio', 'GestioController::gestio');
$routes->get('wysiwyg', 'GestioController::index');
$routes->post('create/add', 'GestioController::add');
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1');
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1');
$routes->post('/modify/(:num)', 'GestioController::update/$1');



