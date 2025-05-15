<?php

use CodeIgniter\Router\RouteCollection;

// $routes->get('/', 'IndexController::index');

$routes->get('/', 'IndexController::home');
$routes->get('index', 'IndexController::index');

$routes->get('botiga', 'IndexController::botiga');

$routes->get('classificacio', 'ClassificacioController::index');
$routes->post('/classificacio/filtrar', 'ClassificacioController::filtrar');

// GALERIA
$routes->get('galeria', 'GaleriaController::getFotos');
$routes->get('galeria/album/(:segment)', 'GaleriaController::getAlbumFotos/$1');
$routes->get('gestio/galeria', 'GaleriaController::album' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/galeria_fotos/(:num)', 'GaleriaController::albumFotos/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/eliminar_foto/(:num)', 'GaleriaController::deleteFoto/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/galeria/crearAlbum', 'GaleriaController::crearAlbum' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/galeria/crearAlbum', 'GaleriaController::crearAlbum_post' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/galeria/eliminarAlbum/(:num)', 'GaleriaController::eliminarAlbum/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/galeria/modify/(:num)', 'GaleriaController::modify/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/galeria/modify/(:num)', 'GaleriaController::modify_post/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/galeria/edit_foto/(:num)', 'GaleriaController::EditFoto/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/galeria/edit_foto/(:num)', 'GaleriaController::EditFoto_post/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/cambiar_estat_foto', 'GaleriaController::cambiarEstatFoto', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/cambiar_estat_foto', 'GaleriaController::cambiarEstatFoto', ['filter' => 'gestio:admin, superadmin']);



// NOTICIES
$routes->get('noticies', 'NoticiesController::index');
$routes->get('noticia/(:segment)', 'NoticiesController::noticia/$1');
$routes->get('gestio/noticies', 'NoticiesController::noticies' , ['filter' => 'gestio:admin, superadmin']);
$routes->match(['get', 'post'], 'gestio/seccions', 'GestioController::seccions' , ['filter' => 'gestio:admin, superadmin']);
$routes->match(['get', 'post'], 'gestio/clubs', 'GestioController::clubs' , ['filter' => 'gestio:admin, superadmin']);

// PROGRAMES
$routes->get('programes/(:segment)', 'ProgramesController::categoria/$1');
$routes->get('gestio/programes', 'ProgramesController::programes' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/eliminar/(:num)', 'ProgramesController::delete_Programa/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/eliminar/(:num)', 'ProgramesController::delete_Programa/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/modify/programa/(:num)', 'ProgramesController::modify_Programa/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/modify/programa/(:num)', 'ProgramesController::modify_Programa_post/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/programes/add', 'ProgramesController::add' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/programes/add', 'ProgramesController::add_post' , ['filter' => 'gestio:admin, superadmin']);
$routes->match(['get', 'post'], 'gestio/equips', 'ProgramesController::equips' , ['filter' => 'gestio:admin, superadmin']);

// CONTACTE
$routes->get('contacte', 'ContacteController::index');
$routes->post('contacte/send', 'ContacteController::send');
$routes->get('contacte/(:any)', 'ContacteController::index/$1');
$routes->match(['get', 'post'], 'configuracio/dades_contacte', 'ConfiguracioController::dades_contacte' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/email', 'ContacteController::email' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/email/send/(:num)', 'ContacteController::emailSend/$1', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/email/send/(:num)', 'ContacteController::emailSend/$1', ['filter' => 'gestio:admin, superadmin']); // GET para mostrar el formulario
$routes->post('gestio/email/send/(:num)', 'ContacteController::emailSend_post/$1', ['filter' => 'gestio:admin, superadmin']); // POST para procesar el formulario
$routes->get('gestio/email/delete/(:num)', 'ContacteController::deleteEmail/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->match(['get', 'post'], 'gestio/assumptes', 'ContacteController::assumptes' , ['filter' => 'gestio:admin, superadmin']);

// SOBRE NOSALTRES
$routes->get('sobreNosaltres', 'SobreNosaltresController::index');
$routes->get('gestio/sobreNosaltres', 'SobreNosaltresController::sobreNosaltres' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('staff', 'SobreNosaltresController::staff');
$routes->get('gestio/staff', 'SobreNosaltresController::gestioStaff' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/staff/modify/(:num)', 'SobreNosaltresController::staffModify/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/staff/modify/(:num)', 'SobreNosaltresController::staffModify_post/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/staff/delete/(:num)', 'SobreNosaltresController::staffDelete/$1' , ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/staff/add', 'SobreNosaltresController::staffAdd' , ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/staff/add', 'SobreNosaltresController::staffAdd_post' , ['filter' => 'gestio:admin, superadmin']);
$routes->match(['get', 'post'], 'gestio/carrecs', 'SobreNosaltresController::gestioCarrecs' , ['filter' => 'gestio:admin, superadmin']);


$routes->get('dades', 'ClassificacioController::obtenirDades');

// ACCIONS GESTIO
$routes->get('gestio', 'SobreNosaltresController::sobreNosaltres', ['filter' => 'gestio:admin, superadmin']);
$routes->get('wysiwyg', 'GestioController::index', ['filter' => 'gestio:admin, superadmin']);
$routes->post('create/add', 'GestioController::add', ['filter' => 'gestio:admin, superadmin']);
$routes->get('create/add/event', 'GestioController::addEvent', ['filter' => 'gestio:admin, superadmin']);
$routes->post('create/add/event', 'GestioController::addEvent_post', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/delete/(:num)', 'GestioController::delete/$1', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/modify/(:num)', 'GestioController::edit/$1', ['filter' => 'gestio:admin, superadmin']);
$routes->post('/modify/(:num)', 'GestioController::update/$1', ['filter' => 'gestio:admin, superadmin']);

// VISTES GESTIO
$routes->get('gestio/configuracio', 'GestioController::configuracio', ['filter' => 'gestio:admin, superadmin']);


$routes->get('gestio/banner', 'GestioController::banner', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/banner/modify/(:num)', 'GestioController::bannerModify/$1', ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/banner/modify/(:num)', 'GestioController::bannerModify_post/$1', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/banner/delete/(:num)', 'GestioController::bannerDelete/$1', ['filter' => 'gestio:admin, superadmin']);
$routes->get('gestio/banner/add', 'GestioController::bannerAdd', ['filter' => 'gestio:admin, superadmin']);
$routes->post('gestio/banner/add', 'GestioController::bannerAdd_post', ['filter' => 'gestio:admin, superadmin']);


// GESTIO CLUBS
$routes->match(['get', 'post'], 'gestio/clubs', 'GestioController::clubs', ['filter' => 'gestio:admin, superadmin']);

// $routes->get('gestio/clubs', 'GestioClubsController::clubs' , ['filter' => 'gestio:admin, superadmin']);
// $routes->get('gestio/clubs/modify/(:num)', 'GestioClubsController::clubsModify/$1' , ['filter' => 'gestio:admin, superadmin']);
// $routes->post('gestio/clubs/modify/(:num)', 'GestioClubsController::clubsModify_post/$1' , ['filter' => 'gestio:admin, superadmin']);
// $routes->get('gestio/clubs/delete/(:num)', 'GestioClubsController::clubsDelete/$1' , ['filter' => 'gestio:admin, superadmin']);
// $routes->get('gestio/clubs/add', 'GestioClubsController::clubsAdd' , ['filter' => 'gestio:admin, superadmin']);
// $routes->post('gestio/clubs/add', 'GestioClubsController::clubsAdd_post' , ['filter' => 'gestio:admin, superadmin']);


// GESTIO EVENTS
$routes->match(['get', 'post'], 'gestio/events', 'GestioController::events', ['filter' => 'gestio:admin, superadmin']);


// UPLOAD
$routes->get('pujarArxiu', 'GestioController::upload_drag', ['filter' => 'gestio:admin, superadmin']);
$routes->post('pujarArxiu', 'GestioController::upload_drag_post', ['filter' => 'gestio:admin, superadmin']);


// CONFIGURACIO MENU GENERAL I XARXES SOCIALS
$routes->match(['get', 'post'], 'config/menu_general', 'ConfiguracioController::menu');
$routes->match(['get', 'post'], 'xarxes_socials', 'ConfiguracioController::xarxes_socials');

// CONFIGURACIO MENU GESTIO
// $routes->match(['get', 'post'],'config/menu_gestio', 'ConfiguracioController::menuGestio' , ['filter' => 'gestio:admin, superadmin']);


// elFinder
$routes->get('elfinder', 'FileExplorerController::manager');
$routes->get('fileconnector', 'FileExplorerController::connector');
$routes->post('fileconnector', 'FileExplorerController::connector');
$routes->get('fileget/(:any)', 'FileExplorerController::getFile');


//USERS 
$routes->get('login', 'UsersController::login');
$routes->post('login', 'UsersController::loginVerify');
$routes->get('logout', 'UsersController::logout');
$routes->match(['get', 'post'], 'gestio/usuaris', 'UsersController::gestioUsuaris', ['filter' => 'gestio:superadmin']);
