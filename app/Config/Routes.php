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
$routes->setDefaultController('SigninController');
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
// route since we don't have to scan directories.s
$routes->get('/login', 'SigninController::index');
$routes->get('/logout', 'SigninController::logout');
$routes->post('/login/submit', 'SigninController::loginAuth');
$routes->get('/register', 'SigninController::register');
$routes->post('/register/submit', 'SigninController::registerSubmit');

$routes->group('', ['filter' => 'authGuard'], function ($routes) {
    /** -HEROES **/
    $routes->get('hero', 'HeroController::index');
    $routes->post('hero/save', 'HeroController::save');
    $routes->delete('hero/delete/(:num)', 'HeroController::delete/$1');

    /** GALLERIES **/
    $routes->get('gallery', 'GalleryController::index');
    $routes->post('gallery/save', 'GalleryController::save');
    $routes->delete('gallery/delete/(:num)', 'GalleryController::delete/$1');

    /** NEWS **/
    $routes->get('news', 'NewsController::index');
    $routes->post('news/save', 'NewsController::save');
    $routes->delete('news/delete/(:num)', 'NewsController::delete/$1');
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
