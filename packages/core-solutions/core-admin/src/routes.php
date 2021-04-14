<?php

/**
 * Package routing file specifies all of this package routes.
 */

use Illuminate\Support\Facades\View;
use CoreSolutions\CoreAdmin\Models\Menu;

if (config('coreadmin.standaloneRoutes')) {
    return;
}

if (Schema::hasTable('menus')) {
    $menus = Menu::with('children')->where('menu_type', '!=', 0)->orderBy('position')->get();
    View::share('menus', $menus);
    if (! empty($menus)) {
        Route::group([
            'middleware' => ['web', 'auth', 'role'],
            'prefix'     => config('coreadmin.route'),
            'as'         => config('coreadmin.route') . '.',
            'namespace'  => 'App\Http\Controllers',
        ], function () use ($menus) {
            foreach ($menus as $menu) {
                switch ($menu->menu_type) {
                    case 1:
                        Route::post(strtolower($menu->name) . '/massDelete', [
                            'as'   => strtolower($menu->name) . '.massDelete',
                            'uses' => 'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller@massDelete'
                        ]);
                        Route::resource(strtolower($menu->name),
                            'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller', ['except' => 'show']);
                        break;
                    case 3:
                        Route::get(strtolower($menu->name), [
                            'as'   => strtolower($menu->name) . '.index',
                            'uses' => 'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller@index',
                        ]);
                        break;
                }
            }
        });
    }
}

Route::group([
    'namespace'  => 'CoreSolutions\CoreAdmin\Controllers',
    'middleware' => ['web', 'auth']
], function () {
    // Dashboard home page route
    Route::get(config('coreadmin.homeRoute'), config('coreadmin.homeAction','CoreAdminController@index'));
    Route::group([
        'middleware' => 'role'
    ], function () {
        // Menu routing

        Route::get(config('coreadmin.route') . '/menu', [
            'as'   => 'menu',
            'uses' => 'CoreAdminMenuController@index'
        ]);
        Route::post(config('coreadmin.route') . '/menu', [
            'as'   => 'menu',
            'uses' => 'CoreAdminMenuController@rearrange'
        ]);

        Route::get(config('coreadmin.route') . '/menu/edit/{id}', [
            'as'   => 'menu.edit',
            'uses' => 'CoreAdminMenuController@edit'
        ]);
        Route::post(config('coreadmin.route') . '/menu/edit/{id}', [
            'as'   => 'menu.edit',
            'uses' => 'CoreAdminMenuController@update'
        ]);

        Route::get(config('coreadmin.route') . '/menu/crud', [
            'as'   => 'menu.crud',
            'uses' => 'CoreAdminMenuController@createCrud'
        ]);
        Route::post(config('coreadmin.route') . '/menu/crud', [
            'as'   => 'menu.crud.insert',
            'uses' => 'CoreAdminMenuController@insertCrud'
        ]);

        Route::get(config('coreadmin.route') . '/menu/parent', [
            'as'   => 'menu.parent',
            'uses' => 'CoreAdminMenuController@createParent'
        ]);
        Route::post(config('coreadmin.route') . '/menu/parent', [
            'as'   => 'menu.parent.insert',
            'uses' => 'CoreAdminMenuController@insertParent'
        ]);

        Route::get(config('coreadmin.route') . '/menu/custom', [
            'as'   => 'menu.custom',
            'uses' => 'CoreAdminMenuController@createCustom'
        ]);
        Route::post(config('coreadmin.route') . '/menu/custom', [
            'as'   => 'menu.custom.insert',
            'uses' => 'CoreAdminMenuController@insertCustom'
        ]);

        Route::get(config('coreadmin.route') . '/actions', [
            'as'   => 'actions',
            'uses' => 'UserActionsController@index'
        ]);
        Route::get(config('coreadmin.route') . '/actions/ajax', [
            'as'   => 'actions.ajax',
            'uses' => 'UserActionsController@table'
        ]);

    });
});

Route::group([
    'namespace'  => 'App\Http\Controllers',
    'middleware' => ['web']
], function () {
    // Point to App\Http\Controllers\UsersController as a resource
    Route::group([
        'middleware' => 'role'
    ], function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
    });
    Route::auth();
});

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin',
    'middleware' => ['web']
], function () {

    Route::get('generate/excel' , ['as' => 'generate.excel' , 'uses' => 'GenerateexcelControler@generate']);
    Route::post('generate/word' , ['as' => 'generate.word.file' , 'uses' => 'GenerateexcelControler@generateWordFile']);

});