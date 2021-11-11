<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
 
// We get a performance increase by specifying the default
// route since we don't have to scan directories.

 //Rutas referentes a login
$routes->group('/', function($routes){
	$routes->get('/', 'login::index', ['as' => 'login']);
	$routes->post('/login', 'login::login');
	$routes->get('/signout', 'login::signout');

});

$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function($routes){

	$routes->get('registro', 'Register::index', ['as' => 'register']);
	$routes->post('store', 'Register::store');
	$routes->get('login', 'login::index', ['as' => 'login']);
	$routes->get('copia', 'Register::copia', ['as' => 'copia']);

});

//solo para administradores
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth:admin,superadmin'], function($routes){
	$routes->get('inicio', 'Dashboard::index', ['as' => 'admin']);
    //Tablas de consultas
	$routes->get('pueblo', 'Pueblo::index', ['as' => 'pueblo']);
	$routes->get('porautorizar', 'Pueblo::porAutorizar', ['as' => 'porautorizar']);
    $routes->get('bajainact', 'Pueblo::deBajaInactiva', ['as' => 'bajainact']);
    //Modificar y crear personas
    $routes->get('pueblo_crear', 'Pueblo::create', ['as' => 'user_create']);
	$routes->post('pueblo_store', 'Pueblo::store', ['as' => 'user_store']);
	$routes->get('pueblo/editar/(:any)', 'Pueblo::edit/$1', ['as' => 'user_edit']);
    $routes->post('admin/actualizar', 'Pueblo::update', ['as' => 'actualizar']);

    //Lista de sub
    $routes->get('redes', 'Pueblo::create', ['as' => 'user_create']);
    $routes->get('cdp/editar/(:any)', 'Casadepaz::edit/$1', ['as' => 'red_edit']);

    //Lista, modificar y crear casa de paz
    $routes->get('cdp', 'Casadepaz::index', ['as' => 'cdp']);
	$routes->get('cdp_crear', 'Casadepaz::create', ['as' => 'cdp_crear']);
    $routes->get('cdp/editar/(:any)', 'Casadepaz::edit/$1', ['as' => 'cdp_edit']);
    $routes->post('cdp/actualizar', 'Casadepaz::update', ['as' => 'cdp_actualizar']);
    $routes->post('cdp_store', 'Casadepaz::store', ['as' => 'cdp_store']);

    //Lista, modificar y crear escuelas
    $routes->get('escuela', 'Escuela::index', ['as' => 'escuela']);
    $routes->get('escuela_crear', 'Escuela::create', ['as' => 'escuela_crear']);
    $routes->get('escuela/editar/(:any)', 'Escuela::edit/$1', ['as' => 'escuela_edit']);
    $routes->post('escuela/actualizar', 'Escuela::update', ['as' => 'escuela_actualizar']);
    $routes->post('escuela_store', 'Escuela::store', ['as' => 'escuela_store']);

    //Mantenimiento de tablas
    $routes->get('gobierno', 'Settings::gobList', ['as' => 'gobierno']);
    $routes->get('estatus', 'Settings::statusList', ['as' => 'estatus']);
    $routes->get('estadocivil', 'Settings::estadocivilList', ['as' => 'estcivil']);
    $routes->get('servicio', 'Settings::servicioList', ['as' => 'servicio']);
    $routes->get('st/editar/(:any)', 'Settings::edit/$1/$1', ['as' => 'editsettig']);
    
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
