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
// Route::get('/solicitante','solicitantesController@index');
Route::resource('/admin','adminController');
// ===========================================
Route::resource('/','indexController');
Route::get('/sobre','indexController@sobre');
Route::get('/termos','indexController@termos');
Route::get('/conduta','indexController@conduta');
Route::get('/encontrecuidador','indexController@encontrecuidador');
Route::get('/resultado','indexController@resultado')->middleware('auth');
// Route::get('/perfil','indexController@perfil');
Route::get('/privacidade','indexController@privacidade');
Route::get('/agradecimento','indexController@agradecimento');
// ===========================================
Route::resource('/paciente','pacientesController')->middleware('auth');
// ===========================================
Route::resource('/pagamentos','pagamentosController')->middleware('auth');
// ===========================================
Route::resource('/prestador','prestadoresController');
Route::get('/prestadorCadastro','prestadoresController@dadosCadastrais')->middleware('auth');
Route::get('/prestadoreslista','prestadoresController@prestadoreslista')->middleware('auth');
Route::put('/aprovar/{id}', 'prestadoresController@aprovar')->middleware('auth');
Route::put('/reprovar/{id}', 'prestadoresController@reprovar')->middleware('auth');

// ===========================================
Route::resource('/recebimentos','recebimentosController')->middleware('auth');
// ===========================================
Route::resource('/servico','servicosController');
Route::get('/servicosContratados','servicosController@servicosContratados')->middleware('auth');
Route::get('/servicosPrestados','servicosController@servicosPrestados')->middleware('auth');
// ===========================================
Route::resource('/solicitante','solicitantesController');
Route::get('/solicitanteCadastro','solicitantesController@dadosCadastrais')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
