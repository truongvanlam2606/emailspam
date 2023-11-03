<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'Admin',
], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');
});

/**
 * Auth
 *
 */
Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth:admin'],
], function () {
    // Login
    Route::get('/','AdminController@index')->name('admin.index');

    // Email template
    Route::group(['prefix' => 'email-templates'], function () {
        Route::get('/create','EmailTemplateController@create')->name('admin.email-template.create');
        Route::get('/datatables','EmailTemplateController@indexByDataTable')->name('admin.email-template.datatables');
        Route::get('/','EmailTemplateController@index')->name('admin.email-template.index');
        Route::get('/{id}', 'EmailTemplateController@show')->name('admin.email-template.show');
        Route::post('/store', 'EmailTemplateController@store')->name('api.email-template.store');
        Route::get('/{id}/edit','EmailTemplateController@edit')->name('admin.email-template.edit');
        Route::get('/{id}/delete','EmailTemplateController@destroy')->name('admin.email-template.delete');
    });

    Route::group(['prefix' => 'email-sendeds'], function () {
        Route::get('/datatables','EmailSendedController@indexByDataTable')->name('admin.email-sended.datatables');
        Route::get('/','EmailSendedController@index')->name('admin.email-sended.index');
    });

    Route::group(['prefix' => 'import-emails'], function () {
        Route::get('/create','ImportEmailController@create')->name('admin.import-email.create');
        Route::get('/datatables','ImportEmailController@indexByDataTable')->name('admin.import-email.datatables');
        Route::get('/','ImportEmailController@index')->name('admin.import-email.index');
        Route::post('/','ImportEmailController@store')->name('admin.import-email.store');
    });

    // Files
    Route::group(['prefix' => 'files'], function () {
        Route::post('/image-single/upload', 'FileController@imageSingleUpload')->name('api.file.image-single.upload');
    });
});


