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

    $routes->get('pueblo_crear', 'Pueblo::create', ['as' => 'user_create']);
	$routes->post('pueblo_store', 'Pueblo::store', ['as' => 'user_store']);
	$routes->get('pueblo/editar/(:any)', 'Pueblo::edit/$1', ['as' => 'user_edit']);
    $routes->post('admin/actualizar', 'Pueblo::update', ['as' => 'actualizar']);
	
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
