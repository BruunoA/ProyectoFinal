<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'IndexController::home');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('classificacio', 'ClassificacioController::index');

$routes->get('galeria', 'GaleriaController::getFotos');

$routes->get('noticies', 'NoticiesController::index');
$routes->get('noticia/(:num)', 'NoticiesController::noticia/$1');

$routes->get('programes', 'ProgramesController::index');

$routes->get('contacte', 'ContacteController::index');

$routes->get('sobreNosaltres', 'SobreNosaltresController::index');

$routes->get('dades', 'ClassificacioController::obtenirDades');

// GESTIO
$routes->get('gestio', 'GestioController::gestio', ['filter' => 'gestio:admin']);
$routes->get('wysiwyg', 'GestioController::index' , ['filter' => 'gestio:admin']);
$routes->post('create/add', 'GestioController::add' , ['filter' => 'gestio:admin']);
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1' , ['filter' => 'gestio:admin']);
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1' , ['filter' => 'gestio:admin']);
$routes->post('/modify/(:num)', 'GestioController::update/$1' , ['filter' => 'gestio:admin']);

// elFinder
$routes->get('elfinder', 'FileExplorerController::manager');
$routes->get('fileconnector', 'FileExplorerController::connector');
$routes->post('fileconnector', 'FileExplorerController::connector');
$routes->get('fileget/(:any)', 'FileExplorerController::getFile');

$routes->get('ck','FileExplorerController::ckeditor');

//USERS 
$routes->get('login', 'UsersController::login');
$routes->post('login', 'UsersController::loginVerify');
$routes->get('logout', 'UsersController::logout');

// Multi idioma
// $routes->get('(:segment)/idioma/cambiar/(:segment)', 'Home::cambiar/$2');

// $routes->get('sobre-nosaltres/missio', 'GestioController::missio');
