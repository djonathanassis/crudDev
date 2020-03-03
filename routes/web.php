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

Route::get('/', 'HomeController@index');

Route::get('/teste/{id}', 'ProductController@teste');

Route::get('/imoveis', 'PropertyController@list');

Route::get('/imoveis/novo', 'PropertyController@create');
Route::post('/imoveis/store', 'PropertyController@store');

Route::get('/imoveis/{name}', 'PropertyController@show');

Route::get('/imoveis/editar/{name}', 'PropertyController@edit');
Route::put('/imoveis/update/{name}', 'PropertyController@update');

Route::get('/imoveis/remover/{name}', 'PropertyController@destroy');

//Rota de categoria

Route::get('/category', 'CategoryController@load');

Route::get('/category/novo', 'CategoryController@create');
Route::post('/category/store', 'CategoryController@store');

Route::get('/category/{url}', 'CategoryController@show');

Route::get('/category/editar/{url}', 'CategoryController@edit');
Route::put('/category/update/{url}', 'CategoryController@update');

Route::get('/category/remover/{url}', 'CategoryController@destroy');

//Rota de produto

Route::get('/product', 'ProductController@load');

Route::get('/product/novo', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');

Route::get('/product/{url}', 'ProductController@show');

Route::get('/product/editar/{url}', 'ProductController@edit');
Route::put('/product/update/{url}', 'ProductController@update');

Route::get('/product/remover/{url}', 'ProductController@destroy');
