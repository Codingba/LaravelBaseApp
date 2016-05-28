<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Login/logout Routes
Route::get('/login', 'Auth\SessionsController@login');
Route::post('/login', 'Auth\SessionsController@postLogin');
Route::get('/logout', 'Auth\SessionsController@logout');

// Registration routes...
Route::get('/register', 'Auth\RegistrationController@register');
Route::post('/register', 'Auth\RegistrationController@postRegister');
Route::get('/register/confirm/{emailtoken}', 'Auth\RegistrationController@confirmEmail');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::group(['middleware' => ['auth', 'authorize']], function(){

    /*
     * All routes below MUST BE ADDED to permissions in the admin area.
     * Otherwise the access management will be flawed.
     * All new permission are attached to the admin role automatically.
     */

    Route::get('admin', 'Admin\DashboardController@index');

    //Users
    Route::get('admin/users', 'Admin\UsersController@index');
    Route::get('admin/user/add',  'Admin\UsersController@create');
    Route::post('admin/user/add',  'Admin\UsersController@store');
    Route::get('admin/user/edit/{id}',  'Admin\UsersController@edit');
    Route::post('admin/user/edit/{id}',  'Admin\UsersController@update');
    Route::get('admin/user/delete/{id}',  'Admin\UsersController@destroy');

    //Roles
    Route::get('admin/roles', 'Admin\RoleController@index');
    Route::get('admin/role/add', 'Admin\RoleController@create');
    Route::post('admin/role/add', 'Admin\RoleController@store');
    Route::get('admin/role/edit/{id}', 'Admin\RoleController@edit');
    Route::post('admin/role/edit/{id}', 'Admin\RoleController@update');
    Route::get('admin/role/delete/{id}', 'Admin\RoleController@destroy');

    //Permissions
    Route::get('admin/permissions', 'Admin\PermissionController@index');
    Route::get('admin/permission/add', 'Admin\PermissionController@create');
    Route::post('admin/permission/add', 'Admin\PermissionController@store');
    Route::get('admin/permission/edit/{id}', 'Admin\PermissionController@edit');
    Route::post('admin/permission/edit/{id}', 'Admin\PermissionController@update');
    Route::get('admin/permission/delete/{id}', 'Admin\PermissionController@destroy');

});