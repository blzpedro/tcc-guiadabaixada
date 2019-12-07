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

Route::get('/', 'IndexController@index');

Route::get('/places', 'PlacesController@index', function () {})->middleware('auth');

Route::get('/perfil', 'PerfilController@index', function () {})->middleware('auth');
Route::put('/perfil', 'PerfilController@update', function () {})->middleware('auth');
Route::post('/favorito', 'FavoritoController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
