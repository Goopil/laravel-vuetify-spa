<?php

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

Route::resource('/admin/users','Admin\UserController')->only(['index', 'show']);
Route::get('{path}', 'Controller@index')->where('path', '(.*)');
Route::get('password/reset/{token}')->name('password.reset');
