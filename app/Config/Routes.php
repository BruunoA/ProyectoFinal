<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Home::index');
 $routes->get('/equipo2', 'IndexController::equipo2');
 $routes->get('/equipo3', 'IndexController::equipo3');

// $routes->get('/', 'IndexController::home');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

// $routes->get('classificacio', 'ClassificacioController::index');

$routes->get('/classificacio', 'ClassificacioController::index');  // Ruta para la vista principal
$routes->post('/classificacio/filtrar', 'ClassificacioController::filtrar');  // Ruta para  los filtros

$routes->get('galeria', 'GaleriaController::getFotos');

$routes->get('noticies', 'NoticiesController::index');
$routes->get('noticia/(:num)', 'NoticiesController::noticia/$1');

$routes->get('programes', 'ProgramesController::index');

$routes->get('contacte', 'ContacteController::index');

$routes->get('sobrenosaltres', 'SobreNosaltresController::index');

$routes->get('dades', 'ClassificacioController::obtenirDades');

$routes->post('contacte/send', 'ContacteController::send');
$routes->get('contacte/(:any)', 'ContacteController::index/$1');

// GESTIO
$routes->get('gestio', 'GestioController::gestio');
$routes->get('wysiwyg', 'GestioController::index');
$routes->post('create/add', 'GestioController::add');
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1');
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1');
$routes->post('/modify/(:num)', 'GestioController::update/$1');



