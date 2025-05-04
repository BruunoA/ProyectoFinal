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

// GESTIO
$routes->get('gestio', 'GestioController::gestio');
$routes->get('wysiwyg', 'GestioController::index');
$routes->post('create/add', 'GestioController::add');
$routes->get('create/add/event', 'GestioController::addEvent' , ['filter' => 'gestio:admin']);
$routes->post('create/add/event', 'GestioController::addEvent_post' , ['filter' => 'gestio:admin']);
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1' , ['filter' => 'gestio:admin']);
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1' , ['filter' => 'gestio:admin']);
$routes->post('/modify/(:num)', 'GestioController::update/$1' , ['filter' => 'gestio:admin']);

$routes->get('pujarArxiu', 'GestioController::upload_drag');
$routes->post('pujarArxiu', 'GestioController::upload_drag_post');

$routes->get('gestio/menu', 'GestioController::menu');
$routes->get('gestio/menu/add', 'GestioController::menuAdd' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/menu/add', 'GestioController::menuAdd_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/menu/modify/(:num)', 'GestioController::menuModify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/menu/modify/(:num)', 'GestioController::menuModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/menu/delete/(:num)', 'GestioController::menuDelete/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/menuGestio', 'GestioController::menuGestio' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/menuGestio/add', 'GestioController::menuGestioAdd' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/menuGestio/add', 'GestioController::menuGestioAdd_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/menuGestio/modify/(:num)', 'GestioController::menuGestioModify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/menuGestio/modify/(:num)', 'GestioController::menuGestioModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/menuGestio/delete/(:num)', 'GestioController::menuGestioDelete/$1' /*, ['filter' => 'gestio:admin']*/);

$routes->get('gestio/sobreNosaltres', 'GestioController::sobreNosaltres' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/configuracio', 'GestioController::configuracio' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/noticies', 'GestioController::noticies' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/events', 'GestioController::events' /*, ['filter' => 'gestio:admin']*/);

$routes->get('gestio/galeria', 'GestioController::album' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria_fotos/(:num)', 'GestioController::albumFotos/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/eliminar_foto', 'GestioController::deleteFoto' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/eliminar_foto', 'GestioController::deleteFoto' /*, ['filter' => 'gestio:admin']*/);

$routes->get('gestio/programes', 'GestioController::programes' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/eliminar/(:num)', 'GestioController::delete_Programa/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/eliminar/(:num)', 'GestioController::delete_Programa/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/modify/programa/(:num)', 'GestioController::modify_Programa/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/modify/programa/(:num)', 'GestioController::modify_Programa_post/$1' /*, ['filter' => 'gestio:admin']*/);

$routes->get('configuracio/dades_contacte', 'ConfiguracioController::dades_contacte' /*, ['filter' => 'gestio:admin']*/);

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
