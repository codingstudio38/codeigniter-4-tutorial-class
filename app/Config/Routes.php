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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
 
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index'); 

 
$routes->get('userlogin', 'User::login',['filter'=>'Guest']); 
$routes->get('register', 'User::register',['filter'=>'Guest']);
$routes->match(['post'],'login', 'User::verify',['filter'=>'Guest']);
$routes->match(['post'],'/userregister', 'User::create',['filter'=>'Guest']);
$routes->get('logout', 'User::logout');


$routes->group("/",['filter'=>'isLoggedIn'], function($routes){
$routes->get('profile', 'User::profile');
$routes->get('delete_profile/(:any)', 'User::profiledelete/$1');
$routes->post('update_profile', 'User::userUpdate');
$routes->post('update_password', 'User::changePassword');
$routes->post('updateThumbnail', 'User::updateThumbnail');
$routes->get('modelTest/', 'Demo::modeldataview');
$routes->match(['post'], '/modelInsert', 'Demo::modeldataInsert');
$routes->get('daletedata/(:any)', 'Demo::modeldataDelete/$1');  
$routes->get('editdata/(:any)', 'Demo::modelEditdataView/$1');  
$routes->match(['post'], '/modelUpdate', 'Demo::modeldataUpdate');
$routes->get('multiple/', 'MultiplesController::index');  
$routes->get('getSelectids/', 'MultiplesController::getSelectids'); 
$routes->post('multipleUpload/', 'MultiplesController::create');  
$routes->post('deleteData/', 'MultiplesController::deleteData');  
$routes->post('editdataview/', 'MultiplesController::editdataview'); 
$routes->post('multipleUpdate/', 'MultiplesController::multipleUpdate'); 
$routes->get('getpostids/', 'MultiplesController::getpostids'); 
$routes->post('multiplefileUpload/', 'MultiplesController::fileUpload'); 
$routes->post('multiplePhoto/', 'MultiplesController::photoUpload'); 
$routes->post('xlInsert/', 'XlController::xlfileupload'); 
$routes->post('proxlfileimport/', 'XlController::xlfileprofile'); 
$routes->get('xlfiledownload/', 'XlController::xlfileexport'); 
$routes->get('pdfview/', 'PdfController::index'); 
$routes->get('pdfexport/', 'PdfController::htmlToPDF');
});
 

$routes->get('demo', 'Demo::index');
$routes->get('migration', 'Multiple::index');
$routes->get('about/(:any)', 'Demo::about/$1');
$routes->get('sessionCreate/', 'Session::sessionCreate');
$routes->get('sessionCheck/', 'Session::sessionCheck');
$routes->get('sessionDestroy/', 'Session::sessionDestroy');
$routes->get('contact', 'Contact::contact');
$routes->match(['post'],'contactInser', 'Contact::contactInser');

// Redourceful Routes for Restful API
$routes->group('api',function($routes){
$routes->resource('getAll',
    [
        'websafe'=>1,
        'controller'=>'\App\Controllers\APICotroller',
        'only'=>['index']
    ]); 
$routes->resource('create',
    [
        'controller'=>'\App\Controllers\APICotroller',
        'only'=>['create']
    ]);
$routes->resource('edit',
    [
        'controller'=>'\App\Controllers\APICotroller',
        'placeholder'=>'(:num)',
        'only'=>['edit']
    ]);
$routes->resource('find',
    [
        'controller'=>'\App\Controllers\APICotroller',
        'placeholder'=>'(:num)',
        'only'=>['show']
    ]);
$routes->resource('update',
    [
        'controller'=>'\App\Controllers\APICotroller',
        'placeholder'=>'(:num)',
        'only'=>['update']
    ]);
$routes->resource('delete',
    [
        'controller'=>'\App\Controllers\APICotroller',
        'placeholder'=>'(:num)',
        'only'=>['delete']
    ]);

});
//except


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
