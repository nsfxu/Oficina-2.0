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
    return redirect('orcamentos');
});

Route::resource('orcamentos', 'OrcamentoController');

Route::get('/cadastro', 'OrcamentoController@create')->name('cadastrar');
Route::get('orcamento/searchDate', 'OrcamentoController@searchDate')->name('searchDate');
Route::get('orcamento/search', 'OrcamentoController@search')->name('search');

