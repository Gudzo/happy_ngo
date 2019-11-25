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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/clients', 'ClientsController', ['only' => ['index', 'edit', 'update', 'destroy', 'search']]);

Route::get('/clients/search', 'ClientsController@search')->name('clients.search');

Route::get('/export', 'ExportController@exportCSV')->name('export');
