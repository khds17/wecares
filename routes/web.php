<?php

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
// Route::get('/solicitante','solicitanteController@index');
Route::resource('/','indexController');
Route::get('/sobre','indexController@sobre');
Route::get('/termos','indexController@termos');
Route::get('/conduta','indexController@conduta');
Route::get('/encontrecuidador','indexController@encontrecuidador');
Route::get('/resultado','indexController@resultado');
Route::get('/perfil','indexController@perfil');
Route::get('/privacidade','indexController@privacidade');
Route::get('/agradecimento','indexController@agradecimento');
Route::resource('/solicitante','solicitanteController');
Route::get('/solicitanteCadastro','solicitanteController@dadosCadastrais');
Route::get('/servicosContratados','solicitanteController@servicosContratados');
Route::get('/pagamentos','solicitanteController@pagamentos');
Route::get('/pacienteCadastro','solicitanteController@pacienteCadastro');
Route::resource('/admin','adminController');
Route::resource('/prestador','prestadorController');
Route::get('/prestadorCadastro','prestadorController@dadosCadastrais');
Route::get('/servicosPrestados','prestadorController@servicosPrestados');
Route::get('/recebimentos','prestadorController@recebimentos');

