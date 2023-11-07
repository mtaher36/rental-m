<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->group('katalog', ['namespace' => 'App\Controllers',], function ($routes) {
    $routes->get('/', 'Katalog::listKatalog');
    $routes->get('edit/(:num)', 'Katalog::edit/$1');
    $routes->get('tambah', 'Katalog::tambahKatalog');
    $routes->post('create', 'Katalog::create');
    $routes->post('update/(:num)', 'Katalog::update/$1');
    $routes->delete('delete/(:num)', 'Katalog::delete/$1');
});

$routes->group('reviews', ['namespace' => 'App\Controllers',], function ($routes) {
    $routes->get('/', 'Reviews::listReviews');
    $routes->get('tambah', 'Reviews::tambahReviews');
    $routes->post('create', 'Reviews::create');
    $routes->get('edit/(:num)', 'Reviews::edit/$1');
    $routes->post('update/(:num)', 'Reviews::update/$1');
    $routes->delete('delete/(:num)', 'Reviews::delete/$1');
});

$routes->group('mimin', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login
    $routes->get('login', 'Auth::login');
    $routes->post('login/authe', 'Auth::authe');
    $routes->get('logout', 'Auth::logout');
    // Register
    $routes->get('register', 'Auth::register');
    $routes->post('register/auth', 'Auth::storeUser');
    // verifikasi
    $routes->get('verifikasi-2fa', 'Auth::verifikasi2fa');
    $routes->post('verifikasi-2fa', 'Auth::verifikasi2fa');


    $routes->get('papan', 'Admin::index');
});


$routes->group('profile', ['namespace' => 'App\Controllers',], function ($routes) {
    $routes->get('/', 'Profile::index');
    $routes->get('edit/(:num)', 'Profile::edit/$1');
    $routes->post('update/(:num)', 'Profile::update/$1');
    $routes->post('change-password/(:num)', 'Profile::changePassword/$1e');
    $routes->get('2fa', 'Profile::index');
    $routes->post('2fa/(:num)', 'Profile::verify2FA/$1');
});


$routes->group('', ['namespace' => 'App\Controllers',], function ($routes) {
    $routes->get('/', 'Client::index');
    $routes->get('detail/(:num)', 'Client::detail/$1');
    // $routes->post('update/(:num)', 'Profile::update/$1');
    // $routes->post('change-password/(:num)', 'Profile::changePassword/$1e');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
