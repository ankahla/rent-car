<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->map(
    [
        '/login' => 'Login::index',
        '/logout' => 'Login::logout',
        '/' => 'Pages::index',
        '/admin/dashboard' => 'admin\\Dashboard::index',
        '/admin/employee' => 'admin\\Employee::index',
    ]
);

$routes->get( '/uploads/(:any)', 'Upload::index/$1');

$routes->match(['GET', 'POST'], '/admin/employee/(:num)/edit', 'admin\\Employee::edit/$1');
$routes->get( '/admin/employee/(:num)/delete', 'admin\\Employee::delete/$1');
$routes->match(['GET', 'POST'], '/admin/employee/add', 'admin\\Employee::add');

$routes->get( '/admin/manufacturers', 'admin\\Manufacturer::index');
$routes->post( '/admin/manufacturers/updateManufacturer', 'admin\\Manufacturer::updateManufacturer');
$routes->post( '/admin/manufacturers/addManufacturer', 'admin\\Manufacturer::addManufacturer');
$routes->get( '/admin/manufacturers/deleteManufacturer/(:num)', 'admin\\Manufacturer::deleteManufacturer/$1');

$routes->get( '/admin/car_model', 'admin\\Model');
$routes->post( '/admin/car_model/addEditModel', 'admin\\Model::addEditModel');
$routes->get( '/admin/car_model/(:num)/deleteModel', 'admin\\Model::deleteModel/$1');

$routes->get( '/admin/customer', 'admin\\Customer');
$routes->match( ['GET', 'POST'], '/admin/customer/(:num)/edit', 'admin\\Customer::edit/$1');
$routes->get( '/admin/customer/(:num)/show', 'admin\\Customer::show/$1');
$routes->get( '/admin/customer/(:num)/delete', 'admin\\Customer::delete/$1');
$routes->match( ['GET', 'POST'], '/admin/customer/add', 'admin\\Customer::add');

$routes->get( '/admin/vehicles', 'admin\\Vehicles');
$routes->get( '/admin/vehicles/(:num)/show', 'admin\\Vehicles::show/$1');
$routes->match( ['GET', 'POST'], '/admin/vehicles/(:num)/edit', 'admin\\Vehicles::edit/$1');
$routes->post( '/admin/vehicles/deleteVehicle', 'admin\\Vehicles::deleteVehicle');
$routes->match( ['GET', 'POST'], '/admin/vehicles/(:num)/mileage', 'admin\\Vehicles::mileage/$1');
$routes->match( ['GET', 'POST'], '/admin/vehicles/(:num)/reset_mileage_counter', 'admin\\Vehicles::resetMileageCounter/$1');
$routes->match( ['GET', 'POST'], '/admin/vehicles/(:num)/insurance_date', 'admin\\Vehicles::insuranceDate/$1');
$routes->match( ['GET', 'POST'], '/admin/vehicles/(:num)/last_control_at', 'admin\\Vehicles::lastControlAt/$1');

$routes->post( '/admin/vehicles/sell', 'admin\\Vehicles::sell');
$routes->get( '/admin/vehicles/soldlist', 'admin\\Vehicles::soldList');
$routes->post( '/admin/vehicles/deleteReservation', 'admin\\Vehicles::deleteReservation');
$routes->get( '/admin/vehicles/(:num)/invoice/(:segment)', 'admin\\Vehicles::invoice/$1/$2');
$routes->get( '/admin/vehicles/newVehicle', 'admin\\Vehicles::newVehicle');
$routes->post( '/admin/vehicles/add', 'admin\\Vehicles::add');
//






/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and youreturn
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
