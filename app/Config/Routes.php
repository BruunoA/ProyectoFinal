<?php

use CodeIgniter\Router\RouteCollection;

// $routes->get('xarxes_socials', 'ConfiguracioController::xarxes_socials');
$routes->match(['get', 'post'],'xarxes_socials', 'ConfiguracioController::xarxes_socials');

$routes->get('menuProva', 'ConfiguracioController::menuProva');
 
$routes->get('/', 'IndexController::index');

$routes->get('home', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('classificacio', 'ClassificacioController::index');

// GALERIA
$routes->get('galeria', 'GaleriaController::getFotos');
$routes->get('galeria/album/(:num)', 'GaleriaController::getAlbumFotos/$1');

// NOTICIES
$routes->get('noticies', 'NoticiesController::index');
$routes->get('noticia/(:segment)', 'NoticiesController::noticia/$1');

// PROGRAMES
$routes->get('programes', 'ProgramesController::index');
$routes->get('programes/juvenil_segona', 'ProgramesController::juvenil_segon_A');
$routes->get('programes/amateur_segona', 'ProgramesController::amateur_segona');
$routes->get('programes/amateur_tercera', 'ProgramesController::amateur_tercera');
$routes->get('programes/cadet_primera_A', 'ProgramesController::cadet_primera_A');
$routes->get('programes/cadet_segona_B', 'ProgramesController::cadet_segona_B');
// $routes->get('programes/cadet_segona', 'ProgramesController::cadet_segona');
$routes->get('programes/infantil_segona_A', 'ProgramesController::infantil_segona_A');
$routes->get('programes/infantil_segona_B', 'ProgramesController::infantil_segona_B');


$routes->get('contacte', 'ContacteController::index');
$routes->post('contacte/send', 'ContacteController::send');
$routes->get('contacte/(:any)', 'ContacteController::index/$1');

$routes->get('sobreNosaltres', 'SobreNosaltresController::index');
$routes->post('/classificacio/filtrar', 'ClassificacioController::filtrar');

$routes->get('dades', 'ClassificacioController::obtenirDades');

// ACCIONS GESTIO
$routes->get('gestio', 'GestioController::sobreNosaltres');
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

// GESTIO GALERIA
// $routes->get('gestio/galeria', 'GestioController::galeria' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria', 'GestioController::album' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria_fotos/(:num)', 'GestioController::albumFotos/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/eliminar_foto', 'GestioController::deleteFoto' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/eliminar_foto', 'GestioController::deleteFoto' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria/crearAlbum', 'GestioController::crearAlbum' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/galeria/crearAlbum', 'GestioController::crearAlbum_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria/eliminarAlbum/(:num)', 'GestioController::eliminarAlbum/$1' /*, ['filter' => 'gestio:admin']*/);


// GESTIO EVENTS
$routes->match(['get', 'post'],'gestio/events', 'GestioController::events' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/events/modify/(:num)', 'GestioController::eventsModify/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('gestio/events/modify/(:num)', 'GestioController::eventsModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/events/eliminar/(:num)', 'GestioController::eventsDelete/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/events/tipus', 'GestioController::eventsTipus' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/events/tipus/modify/(:num)', 'GestioController::eventsTipusModify/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('gestio/events/tipus/modify/(:num)', 'GestioController::eventsTipusModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/events/tipus/delete/(:num)', 'GestioController::eventsTipusDelete/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/events/tipus/add', 'GestioController::eventsTipusAdd' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('gestio/events/tipus/add', 'GestioController::eventsTipusAdd_post' /*, ['filter' => 'gestio:admin']*/);


// UPLOAD
$routes->get('pujarArxiu', 'GestioController::upload_drag');
$routes->post('pujarArxiu', 'GestioController::upload_drag_post');

// CONFIGURACIO MENU GENERAL
$routes->match(['get', 'post'],'config/menu_general', 'ConfiguracioController::menu');
// $routes->get('config/menu/add', 'ConfiguracioController::menuAdd' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('config/menu/add', 'ConfiguracioController::menuAdd_post' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('config/menu/modify/(:num)', 'ConfiguracioController::menuModify/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('config/menu/modify/(:num)', 'ConfiguracioController::menuModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('config/menu/delete/(:num)', 'ConfiguracioController::menuDelete/$1' /*, ['filter' => 'gestio:admin']*/);

// CONFIGURACIO MENU GESTIO
$routes->match(['get', 'post'],'config/menu_gestio', 'ConfiguracioController::menuGestio' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('config/menuGestio/add', 'ConfiguracioController::menuGestioAdd' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('config/menuGestio/add', 'ConfiguracioController::menuGestioAdd_post' /*, ['filter' => 'gestio:admin']*/);

// CONFIGURACIO DADES CONTACTE
$routes->match(['get', 'post'],'configuracio/dades_contacte', 'ConfiguracioController::dades_contacte' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('configuracio/dades_contacte/add', 'ConfiguracioController::dades_contacteAdd' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('configuracio/dades_contacte/add', 'ConfiguracioController::dades_contacteAdd_post' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('configuracio/dades_contacte/modify/(:num)', 'ConfiguracioController::dades_contacteModify/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('configuracio/dades_contacte/modify/(:num)', 'ConfiguracioController::dades_contacteModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('configuracio/dades_contacte/delete/(:num)', 'ConfiguracioController::dades_contacteDelete/$1' /*, ['filter' => 'gestio:admin']*/);


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
