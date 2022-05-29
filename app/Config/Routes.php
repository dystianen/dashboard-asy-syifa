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
$routes->add('/login/submit', 'SigninController::loginAuth');
$routes->get('/register', 'SignupController::index');

$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {
    /** EMPLOYEE **/
    $routes->get('dashboard', 'Home::index');
    $routes->get('employee', 'Employee::index');
    $routes->add('employee/form', 'Employee::create');
    $routes->add('employee/save', 'Employee::save');
    $routes->add('employee/edit/(:num)', 'Employee::edit/$1');
    $routes->add('employee/update/(:num)', 'Employee::update/$1');
    $routes->add('employee/detail/(:num)', 'Employee::detail/$1');
    $routes->delete('employee/delete/(:num)', 'Employee::delete/$1');

    /** JOBS **/
    $routes->get('job', 'Job::index');
    $routes->get('job/form', 'Job::form');
    $routes->add('job/save', 'Job::save');

    /** ATTEDANCE **/
    $routes->get('attedance', 'AttedanceController::index');
    
    /** CATEGORIES **/
    $routes->get('category', 'CategoryController::index');
    $routes->add('category/form', 'CategoryController::create');
    $routes->add('category/save', 'CategoryController::save');
    $routes->add('category/edit/(:num)', 'CategoryController::edit/$1');
    $routes->add('category/update/(:num)', 'CategoryController::update/$1');
    $routes->add('category/detail/(:num)', 'CategoryController::detail/$1');
    $routes->delete('category/delete/(:num)', 'CategoryController::delete/$1');

});

// $routes->group('employee', static function ($routes) {
//     $routes->get('dashboard', 'H')
// })

$routes->group('user', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'User::index', ['filter' => 'authGuard']);
    $routes->get('scan', 'User::scanner', ['filter' => 'authGuard']);
    $routes->get('profile', 'User::profile', ['filter' => 'authGuard']);
    $routes->get('absent', 'User::absent', ['filter' => 'authGuard']);

    $routes->get('permission', 'AttedanceController::permission', ['filter' => 'authGuard']);
    $routes->add('permission/submit', 'AttedanceController::permissionSave', ['filter' => 'authGuard']);

    $routes->get('report', 'User::report', ['filter' => 'authGuard']);
    $routes->get('task', 'User::task', ['filter' => 'authGuard']);
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