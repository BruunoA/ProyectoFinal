<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'IndexController::home');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('classificacio', 'ClassificacioController::index');

$routes->get('galeria', 'GaleriaController::getFotos');
$routes->get('galeria/album/(:num)', 'GaleriaController::getAlbumFotos/$1');

$routes->get('noticies', 'NoticiesController::index');
$routes->get('noticia/(:num)', 'NoticiesController::noticia/$1');

$routes->get('programes', 'ProgramesController::index');

$routes->get('contacte', 'ContacteController::index');

$routes->get('sobreNosaltres', 'SobreNosaltresController::index');

$routes->get('dades', 'ClassificacioController::obtenirDades');

// ACCIONS GESTIO
$routes->get('gestio', 'GestioController::gestio');
$routes->get('wysiwyg', 'GestioController::index');
$routes->post('create/add', 'GestioController::add');
$routes->get('create/add/event', 'GestioController::addEvent' , ['filter' => 'gestio:admin']);
$routes->post('create/add/event', 'GestioController::addEvent_post' , ['filter' => 'gestio:admin']);
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1' , ['filter' => 'gestio:admin']);
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1' , ['filter' => 'gestio:admin']);
$routes->post('/modify/(:num)', 'GestioController::update/$1' , ['filter' => 'gestio:admin']);

// VISTES GESTIO
$routes->get('gestio/sobreNosaltres', 'GestioController::sobreNosaltres' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/configuracio', 'GestioController::configuracio' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/noticies', 'GestioController::noticies' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/events', 'GestioController::events' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria', 'GestioController::galeria' /*, ['filter' => 'gestio:admin']*/);

// UPLOAD
$routes->get('pujarArxiu', 'GestioController::upload_drag');
$routes->post('pujarArxiu', 'GestioController::upload_drag_post');

// CONFIGURACIO MENU GENERAL
$routes->get('config/menu_general', 'ConfiguracioController::menu');
$routes->get('config/menu/add', 'ConfiguracioController::menuAdd' /*, ['filter' => 'gestio:admin']*/);
$routes->post('config/menu/add', 'ConfiguracioController::menuAdd_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('config/menu/modify/(:num)', 'ConfiguracioController::menuModify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('config/menu/modify/(:num)', 'ConfiguracioController::menuModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('config/menu/delete/(:num)', 'ConfiguracioController::menuDelete/$1' /*, ['filter' => 'gestio:admin']*/);

// CONFIGURACIO MENU GESTIO
// TODO: ELIMINAR MODIFCAR, ELIMINAR Y AFEGIR, JA EXISTEIXEN A MENU GENERAL
$routes->get('config/menuGestio', 'ConfiguracioController::menuGestio' /*, ['filter' => 'gestio:admin']*/);
$routes->get('config/menuGestio/add', 'ConfiguracioController::menuGestioAdd' /*, ['filter' => 'gestio:admin']*/);
$routes->post('config/menuGestio/add', 'ConfiguracioController::menuGestioAdd_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('config/menuGestio/modify/(:num)', 'ConfiguracioController::menuGestioModify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('config/menuGestio/modify/(:num)', 'ConfiguracioController::menuGestioModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('config/menuGestio/delete/(:num)', 'ConfiguracioController::menuGestioDelete/$1' /*, ['filter' => 'gestio:admin']*/);

// CONFIGURACIO DADES CONTACTE
$routes->get('configuracio/dades_contacte', 'ConfiguracioController::dades_contacte' /*, ['filter' => 'gestio:admin']*/);
$routes->get('configuracio/dades_contacte/add', 'ConfiguracioController::dades_contacteAdd' /*, ['filter' => 'gestio:admin']*/);
$routes->post('configuracio/dades_contacte/add', 'ConfiguracioController::dades_contacteAdd_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('configuracio/dades_contacte/modify/(:num)', 'ConfiguracioController::dades_contacteModify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('configuracio/dades_contacte/modify/(:num)', 'ConfiguracioController::dades_contacteModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('configuracio/dades_contacte/delete/(:num)', 'ConfiguracioController::dades_contacteDelete/$1' /*, ['filter' => 'gestio:admin']*/);


// elFinder
$routes->get('elfinder', 'FileExplorerController::manager');
$routes->get('fileconnector', 'FileExplorerController::connector');
$routes->post('fileconnector', 'FileExplorerController::connector');
$routes->get('fileget/(:any)', 'FileExplorerController::getFile');

// $routes->get('ck','FileExplorerController::ckeditor');

//USERS 
$routes->get('login', 'UsersController::login');
$routes->post('login', 'UsersController::loginVerify');
$routes->get('logout', 'UsersController::logout');
