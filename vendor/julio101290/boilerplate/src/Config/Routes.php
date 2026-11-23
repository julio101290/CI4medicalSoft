<?php


$routes->set404Override('julio101290\boilerplate\Controllers\ErrorController::index');

$routes->group('admin', function ($routes) {

    /**
     * Admin routes.
     * */
    $routes->group('/', [
        'filter' => config('Boilerplate')->dashboard['filter'],
        'namespace' => config('Boilerplate')->dashboard['namespace'],
            ], function ($routes) {
                $routes->get('/', config('Boilerplate')->dashboard['controller']);
            });

    /**
     * User routes.
     * */
    $routes->group('user', [
        'filter' => 'permission:back-office',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
            ], function ($routes) {
                $routes->match(['get', 'post'], 'profile', 'UserController::profile', ['as' => 'user-profile']);
                $routes->resource('manage', [
                    'filter' => 'permission:manage-user',
                    'namespace' => 'julio101290\boilerplate\Controllers\Users',
                    'controller' => 'UserController',
                    'except' => 'show',
                ]);
            });

    /**
     * Permission routes.
     */
    $routes->resource('permission', [
        'filter' => 'permission:role-permission',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
        'controller' => 'PermissionController',
        'except' => 'show,new',
    ]);

    /**
     * Role routes.
     */
    $routes->resource('role', [
        'filter' => 'permission:role-permission',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
        'controller' => 'RoleController',
    ]);

    /**
     * Menu routes.
     */
    $routes->resource('menu', [
        'filter' => 'permission:menu-permission',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
        'controller' => 'MenuController',
        'except' => 'new,show',
    ]);

    $routes->put('menu-update', 'MenuController::new', [
        'filter' => 'permission:menu-permission',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
        'except' => 'show',
        'as' => 'menu-update',
    ]);

    /**
     * Users Update
     */
    $routes->post('user/manage/(:any)/update', 'UserController::update/$1', [
        'filter' => 'permission:back-office',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
        'except' => 'show',
        'as' => 'update',
    ]);

    $routes->post('role/(:any)/update', 'RoleController::update/$1', [
        'filter' => 'permission:role-permission',
        'namespace' => 'julio101290\boilerplate\Controllers\Users',
        'except' => 'show',
        'as' => 'updateRole',
    ]);

    $routes->get('generateCRUD/(:any)'
            , 'AutoCrudController::index/$1'
            , ['namespace' => 'julio101290\boilerplate\Controllers']
    );

    $routes->get('generateCRUDComposer/(:any)'
            , 'AutoCrudControllerComposer::index/$1'
            , ['namespace' => 'julio101290\boilerplate\Controllers']
    );

    $routes->get('user/manage/(:any)/clone'
            , 'UserController::clone/$1'
            , ['namespace' => 'julio101290\boilerplate\Controllers\Users']
    );
    
    
    $routes->get('error404', 'julio101290\boilerplate\Controllers\ErrorController::index');
    
});
