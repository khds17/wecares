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
Route::get('/listagemAdmin','adminController@listaAdmins');
Route::get('/listagemServicos','adminController@listaServicosPrestados');
Route::get('/adminCadastro','adminController@dadosCadastrais');
// ===========================================
Route::resource('/','indexController');
Route::get('/sobre','indexController@sobre');
Route::get('/termos','indexController@termos');
Route::get('/conduta','indexController@conduta');
Route::get('/encontrecuidador','indexController@encontrecuidador');
Route::get('/registros','indexController@registros');
Route::get('/cuidadorcidades','indexController@getCidades');
// Route::get('/perfil','indexController@perfil');
Route::get('/privacidade','indexController@privacidade');
Route::get('/agradecimento','indexController@agradecimento');
// ===========================================
Route::resource('/paciente','pacientesController')->middleware('auth');
Route::post('/selectpacientes/{id}','pacientesController@selectPacientes');
// ===========================================
Route::resource('/pagamentos','pagamentosController')->middleware('auth');
// ===========================================
Route::resource('/prestador','prestadoresController');
Route::get('/prestadorCadastro','prestadoresController@dadosCadastrais')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/resultado','prestadoresController@resultado')->middleware('auth')->middleware('role:solicitante');
Route::get('/prestadoresLista','prestadoresController@prestadoreslista')->middleware('auth');
Route::get('/novaspropostas','prestadoresController@prestadoresPropostas')->middleware('auth');
Route::put('/aprovar/{id}', 'prestadoresController@aprovar')->middleware('auth');
Route::put('/reprovar/{id}', 'prestadoresController@reprovar')->middleware('auth');

// ===========================================
Route::resource('/recebimentos','recebimentosController')->middleware('auth');
// ===========================================
Route::resource('/servico','servicosController');
Route::post('/proposta','servicosController@propostas')->middleware('auth');
Route::get('/servicosContratados','servicosController@servicosContratados')->middleware('auth');
Route::get('/servicosPrestados','servicosController@servicosPrestados')->middleware('auth');
Route::get('/servicosContratados','servicosController@servicosContratados')->middleware('auth');
Route::get('/servicos','servicosController@servicos')->middleware('auth');
Route::put('/aceitarProspostaPrestador/{id}', 'servicosController@aceitarProspostaPrestador')->middleware('auth');
Route::put('/recusarProspostaPrestador/{id}', 'servicosController@recusarProspostaPrestador')->middleware('auth');
Route::put('/aceitarPropostaSolicitante/{id}', 'servicosController@aceitarPropostaSolicitante')->middleware('auth');
Route::put('/recusarProspostaSolicitante/{id}', 'servicosController@recusarProspostaSolicitante')->middleware('auth');

// ===========================================
Route::resource('/solicitante','solicitantesController');
Route::get('/solicitanteCadastro','solicitantesController@dadosCadastrais')->middleware('auth');
Route::get('/propostas','solicitantesController@solicitantePropostas')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
