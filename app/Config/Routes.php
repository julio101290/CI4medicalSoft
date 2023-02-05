<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'Home::index');

$routes->group('admin', function ($routes) {



       $routes->group('/', [
        'filter'    => config('Boilerplate')->dashboard['filter'],
        'namespace' => config('Boilerplate')->dashboard['namespace'],
    ], function ($routes) {
        $routes->get('/', config('Boilerplate')->dashboard['controller']);
    });
    
    $routes->resource('settings', [
        'filter' => 'permission:configuracion-permiso',
        'controller' => 'HospitalController',
    ]);

    /**
     * Ruta Para Guardar
     */
    $routes->post('configuracion/guardar', 'HospitalController::guardar');

    /**
     * Ruta Para la vista de bitacora 
     */
    $routes->resource('bitacora', [
        'filter' => 'permission:bitacora-permiso',
        'controller' => 'BitacoraController',
        'except' => 'show'
    ]);

    /**
     * Rutas para el CRUD de Pacientes
     */
    $routes->resource('pacientes', [
        'filter' => 'permission:pacientes-permiso',
        'controller' => 'PacientesController',
        'except' => 'show'
    ]);

    $routes->post('pacientes/guardar', 'PacientesController::guardar');

    $routes->post('pacientes/traerPaciente', 'PacientesController::traePaciente');

    $routes->post('pacientes/traerPacientesAjax', 'PacientesController::traerPacientesAjax');

    /**
     * Rutas para los medicamentos
     */
    $routes->resource('medicamentos', [
        'filter' => 'permission:medicamentos-permiso',
        'controller' => 'MedicamentosController',
        'except' => 'show'
    ]);

    $routes->post('medicamentos/guardar', 'MedicamentosController::guardar');

    $routes->post('medicamentos/traerMedicamento', 'MedicamentosController::traeMedicamento');

    $routes->get('tratamientos/traeTratamientosTabla', 'MedicamentosController::traeMedicamentoTabla');

    /**
     * Rutas para el CRUD de enfermedades
     */
    $routes->resource('enfermedades', [
        'filter' => 'permission:enfermedades-permiso',
        'controller' => 'EnfermedadesController',
        'except' => 'show'
    ]);

    $routes->post('enfermedades/guardar', 'EnfermedadesController::guardar');

    $routes->post('enfermedades/traerEnfermedad', 'EnfermedadesController::traeEnfermedad');

    $routes->get('enfermedades/traeEnfermedadesTabla', 'EnfermedadesController::traeEnfermedadesTablaConsultas');

    /**
     * Rutas para el modulo de citas
     */
    $routes->resource('citas', [
        'filter' => 'permission:citas-permiso',
        'controller' => 'CitasController',
        'except' => 'show'
    ]);

    $routes->post('citas/guardar', 'CitasController::guardar');

    $routes->post('citas/traeCita', 'CitasController::traeCita');

    $routes->get('consultas/generarConsulta', 'ConsultasController::generarConsulta');

    $routes->post('consultas/guardar', 'ConsultasController::guardar');

    $routes->get('consultas/reporte/(:any)', 'ConsultasController::reporte/$1');

    $routes->get('consultas/listaConsultas', 'ConsultasController::index');
    
    $routes->get('consultas/consultasAnteriores/(:any)', 'ConsultasController::consultasAnteriores/$1');

    $routes->resource('consultas', [
        'controller' => 'ConsultasController',
        'except' => 'show'
    ]);
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
