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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile');

Route::get('/allcurrentproject', 'RequestsController@allcurrentproject');

Route::get('/allassignedproject', 'RequestsController@allassignedproject');

Route::get('/edit', 'HomeController@edit');

Route::post('/update', 'HomeController@update');

Route::post('/project/add', 'ProjectsController@add');

Route::post('/request','RequestsController@send');

Route::get('/request','RequestsController@getAllRequest');

Route::post('/acceptrequest','RequestsController@acceptrequest');

Route::post('/setmodule','RequestsController@setmodule');

Route::get('/projectmodule','ProjectsController@getAllProjectModule');
