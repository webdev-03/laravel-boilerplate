<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'allowed']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'Admin'], function () {
        Route::post('permission', 'PermissionController@store')->name('permission.store');
        Route::get('permission', 'PermissionController@index')->name('permission.index');
        Route::get('permission/create', 'PermissionController@create')->name('permission.create');
        Route::patch('permission/{permission}', 'PermissionController@update')->name('permission.update');
        Route::delete('permission/{permission}', 'PermissionController@destroy')->name('permission.destroy');
        Route::get('permission/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
        Route::get('role', 'RoleController@index')->name('role.index');
        Route::post('role', 'RoleController@store')->name('role.store');
        Route::get('role/create', 'RoleController@create')->name('role.create');
        Route::patch('role/{role}', 'RoleController@update')->name('role.update');
        Route::delete('role/{role}', 'RoleController@destroy')->name('role.destroy');
        Route::get('role/{role}/edit', 'RoleController@edit')->name('role.edit');
    });
});
