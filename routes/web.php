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
Route::get('/resultado','indexController@resultado');
Route::get('/perfil','indexController@perfil');
Route::get('/privacidade','indexController@privacidade');
Route::get('/agradecimento','indexController@agradecimento');
// ===========================================
Route::resource('/paciente','pacientesController');
// ===========================================
Route::resource('/pagamentos','pagamentosController');
// ===========================================
Route::resource('/prestador','prestadoresController');
Route::get('/prestadorCadastro','prestadoresController@dadosCadastrais');
Route::get('/prestadoreslista','prestadoresController@prestadoreslista');
Route::put('/aprovar/{id}', 'prestadoresController@aprovar');
Route::put('/reprovar/{id}', 'prestadoresController@reprovar');

// ===========================================
Route::resource('/recebimentos','recebimentosController');
// ===========================================
Route::resource('/servico','servicosController');
Route::get('/servicosContratados','servicosController@servicosContratados');
Route::get('/servicosPrestados','servicosController@servicosPrestados');
// ===========================================
Route::resource('/solicitante','solicitantesController');
Route::get('/solicitanteCadastro','solicitantesController@dadosCadastrais');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
