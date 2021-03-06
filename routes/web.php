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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
// Fundos
$this->group(['prefix' => 'admin', 'namespace' => 'Painel', 'middleware' => 'auth'], function(){
    $this->get('fundocnpj'      , 'FundosController@cnpj'           )->name('fundo.cnpj');
    $this->get('validapis'      , 'FunctionsController@validatePis' )->name('validatePis');
    $this->get('mask'           , 'FunctionsController@mask'        )->name('mask');
    $this->get('dashboard'      , 'DashboardsController@master'     )->name('dashmaster');
    $this->resource('fundo'     , 'FundosController'                );
});
/*Route::get('/fundos',       'Painel\FundosController@index')->name('fundos')->middleware('auth');
Route::get('/fundos/cnpj/', 'Painel\FundosController@cnpj')->name('fundos.cnpj')->middleware('auth');
Route::get('/validatepis',  'Painel\FunctionsController@validatePis')->name('validatePis')->middleware('auth');
Route::get('/mask',         'Painel\FunctionsController@validatePis')->name('validatePis')->middleware('auth');
Route::get('/dashboard/master', 'Painel\DashboardsController@master')->name('dashmaster')->middleware('auth');

Route::resource('fundo', 'Painel\FundosController')->middleware('auth');*/