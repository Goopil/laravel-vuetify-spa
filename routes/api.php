<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('translations/locale/{lang}', 'TranslationController@showPerLang');

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('user', 'Auth\LoginController@user');

    Route::resource('translations', 'TranslationController');
    Route::resource('users', 'UserController');

    Route::patch('settings/profile', 'Settings\UpdateProfile');
    Route::patch('settings/password', 'Settings\UpdatePassword');
});

Route::group([
    'middleware' => 'guest:api'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

