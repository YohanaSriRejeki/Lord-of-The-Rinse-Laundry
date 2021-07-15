<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
// $routes->get('/', 'Home::index');
$routes->get('/', 'Pegawai::landing');
$routes->get('/contact', 'Pegawai::contact');
$routes->get('/about', 'Pegawai::about');
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/tambah', 'Pelanggan::create');
$routes->post('/pelanggan/simpan', 'Pelanggan::save');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update/(:num)', 'Pelanggan::update/$1');
$routes->delete('/pelanggan/hapus/(:num)', 'Pelanggan::delete/$1');

$routes->get('/paket', 'Paket::index');
$routes->get('/paket/tambah', 'Paket::create');
$routes->post('/paket/simpan', 'Paket::save');
$routes->get('/paket/edit/(:num)', 'Paket::edit/$1');
$routes->post('/paket/update/(:num)', 'Paket::update/$1');
$routes->delete('/paket/hapus/(:num)', 'Paket::delete/$1');

$routes->get('/login', 'Pegawai::login');
$routes->post('/login/cek', 'Pegawai::check');
$routes->get('/login2', function () {
	return view('/pegawai/login2');
});

$routes->get('/dashboard/admin', 'Pegawai::dash');
$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/tambah', 'Pegawai::create');
$routes->post('/pegawai/simpan', 'Pegawai::save');
$routes->get('/paket/edit/(:num)', 'Pegawai::edit/$1');
$routes->post('/pegawai/update/(:num)', 'Pegawai::update/$1');
$routes->delete('/pegawai/hapus/(:num)', 'Pegawai::delete/$1');

$routes->get('/logout', 'Pegawai::destroy');

$routes->get('/role', 'Role::index');
$routes->get('/role/tambah', 'Role::create');
$routes->post('/role/simpan', 'Role::save');
$routes->get('/role/edit/(:num)', 'Role::edit/$1');
$routes->post('/role/update/(:num)', 'Role::update/$1');
$routes->delete('/role/hapus/(:num)', 'Role::delete/$1');
$routes->get('/master', function () {
	return view('/layouts/pegawai/master');
});
$routes->get('/edit', function () {
	return view('/role/tampilan');
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
