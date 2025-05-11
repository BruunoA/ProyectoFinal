<?php

use CodeIgniter\Router\RouteCollection;

// $routes->get('xarxes_socials', 'ConfiguracioController::xarxes_socials');
$routes->match(['get', 'post'],'xarxes_socials', 'ConfiguracioController::xarxes_socials');

// $routes->get('menuProva', 'ConfiguracioController::menuProva');
 
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
$routes->get('programes/(:segment)', 'ProgramesController::categoria/$1');

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
$routes->get('create/add/event', 'GestioController::addEvent' /*, ['filter' => 'gestio:admin']*/);
$routes->post('create/add/event', 'GestioController::addEvent_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('/modify/(:num)', 'GestioController::update/$1'/* , ['filter' => 'gestio:admin']*/);

// VISTES GESTIO
$routes->get('gestio/sobreNosaltres', 'GestioController::sobreNosaltres' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/configuracio', 'GestioController::configuracio' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/noticies', 'GestioController::noticies' /*, ['filter' => 'gestio:admin']*/);

// GESTIO GALERIA
// $routes->get('gestio/galeria', 'GestioController::galeria' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria', 'GestioGaleriaController::album' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria_fotos/(:num)', 'GestioGaleriaController::albumFotos/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/eliminar_foto', 'GestioGaleriaController::deleteFoto' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/eliminar_foto', 'GestioGaleriaController::deleteFoto' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria/crearAlbum', 'GestioGaleriaController::crearAlbum' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/galeria/crearAlbum', 'GestioGaleriaController::crearAlbum_post' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria/eliminarAlbum/(:num)', 'GestioGaleriaController::eliminarAlbum/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria/modify/(:num)', 'GestioGaleriaController::modify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/galeria/modify/(:num)', 'GestioGaleriaController::modify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/galeria/edit_foto/(:num)', 'GestioGaleriaController::EditFoto/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/galeria/edit_foto/(:num)', 'GestioGaleriaController::EditFoto_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/cambiar_estat_foto', 'GestioGaleriaController::cambiarEstatFoto'/*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/cambiar_estat_foto', 'GestioGaleriaController::cambiarEstatFoto'/*, ['filter' => 'gestio:admin']*/);


$routes->get('gestio/banner', 'GestioController::banner' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/banner/modify/(:num)', 'GestioController::bannerModify/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('gestio/banner/modify/(:num)', 'GestioController::bannerModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/banner/delete/(:num)', 'GestioController::bannerDelete/$1' /*, ['filter' => 'gestio:admin']*/);
// $routes->get('gestio/banner/add', 'GestioController::bannerAdd' /*, ['filter' => 'gestio:admin']*/);
// $routes->post('gestio/banner/add', 'GestioController::bannerAdd_post' /*, ['filter' => 'gestio:admin']*/);

// GESTIO CLUBS
$routes->get('gestio/clubs', 'GestioClubsController::clubs' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/clubs/modify/(:num)', 'GestioClubsController::clubsModify/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/clubs/modify/(:num)', 'GestioClubsController::clubsModify_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/clubs/delete/(:num)', 'GestioClubsController::clubsDelete/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/clubs/add', 'GestioClubsController::clubsAdd' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/clubs/add', 'GestioClubsController::clubsAdd_post' /*, ['filter' => 'gestio:admin']*/);

// GESTIO PROGRAMES
$routes->get('gestio/programes', 'GestioProgramesController::programes' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/eliminar/(:num)', 'GestioProgramesController::delete_Programa/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/eliminar/(:num)', 'GestioProgramesController::delete_Programa/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/modify/programa/(:num)', 'GestioProgramesController::modify_Programa/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/modify/programa/(:num)', 'GestioProgramesController::modify_Programa_post/$1' /*, ['filter' => 'gestio:admin']*/);
$routes->get('gestio/programes/add', 'GestioProgramesController::add' /*, ['filter' => 'gestio:admin']*/);
$routes->post('gestio/programes/add', 'GestioProgramesController::add_post' /*, ['filter' => 'gestio:admin']*/);
$routes->match(['get', 'post'],'gestio/equips', 'GestioProgramesController::equips' /*, ['filter' => 'gestio:admin']*/);

// GESTIO EVENTS
$routes->match(['get', 'post'],'gestio/events', 'GestioController::events' /*, ['filter' => 'gestio:admin']*/);

// UPLOAD
$routes->get('pujarArxiu', 'GestioController::upload_drag');
$routes->post('pujarArxiu', 'GestioController::upload_drag_post');

// CONFIGURACIO MENU GENERAL
$routes->match(['get', 'post'],'config/menu_general', 'ConfiguracioController::menu');

// CONFIGURACIO MENU GESTIO
$routes->match(['get', 'post'],'config/menu_gestio', 'ConfiguracioController::menuGestio' /*, ['filter' => 'gestio:admin']*/);

// CONFIGURACIO DADES CONTACTE
$routes->match(['get', 'post'],'configuracio/dades_contacte', 'ConfiguracioController::dades_contacte' /*, ['filter' => 'gestio:admin']*/);

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
