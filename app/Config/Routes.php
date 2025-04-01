<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'IndexController::home');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('classificacio', 'ClassificacioController::index');

$routes->get('galeria', 'GaleriaController::getFotos');

$routes->get('noticies', 'NoticiesController::index');
$routes->get('noticia/(:num)', 'NoticiesController::noticia/$1');

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
// elFinder
$routes->get('elfinder', 'FileExplorerController::manager');
$routes->post('elfinder', 'FileExplorerController::manager');
$routes->get('fileget/(:any)', 'FileExplorerController::getFile');
$routes->get('fileconnector', 'FileExplorerController::connector');
$routes->post('fileconnector', 'FileExplorerController::connector');

$routes->get('ck','FileExplorerController::ckeditor');