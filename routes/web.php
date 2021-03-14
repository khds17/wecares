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
// Route::resource('/admin','adminController');
Route::resource('/admin','adminController')->middleware('auth')->middleware('role:administrador');
Route::get('/listaAdmins','adminController@listaAdmins')->middleware('auth')->middleware('role:administrador');
Route::get('/listaServicosPrestados','adminController@listaServicosPrestados')->middleware('auth')->middleware('role:administrador');
Route::get('/cadastroAdmin','adminController@cadastroAdmin')->middleware('auth')->middleware('role:administrador');
Route::put('/aprovarPrestador/{id}', 'adminController@aprovarPrestador')->middleware('auth')->middleware('role:administrador');
Route::put('/reprovarPrestador/{id}', 'adminController@reprovarPrestador')->middleware('auth')->middleware('role:administrador');
Route::get('/prestadoresLista','adminController@prestadoresLista')->middleware('auth')->middleware('role:administrador');
// ===========================================
Route::resource('/','indexController');
Route::get('/sobre','indexController@sobre');
Route::get('/termos','indexController@termos');
Route::get('/conduta','indexController@conduta');
Route::get('/encontreCuidador','indexController@encontreCuidador');
Route::get('/registros','indexController@registros');
Route::get('/cuidadorCidades','indexController@cuidadorCidades');
Route::get('/privacidade','indexController@privacidade');
Route::get('/agradecimento','indexController@agradecimento');
Route::get('/resultado','indexController@resultado')->middleware('auth')->middleware('role:solicitante');
// ===========================================
Route::resource('/paciente','pacientesController')->middleware('auth')->middleware('role:solicitante');
Route::post('/selectPacientes/{id}','pacientesController@selectPacientes')->middleware('role:solicitante');
// ===========================================
Route::resource('/prestador','prestadoresController');
Route::get('/cadastroPrestador','prestadoresController@cadastroPrestador')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/novaspropostas','prestadoresController@prestadoresPropostas')->middleware('auth')->middleware('role:cuidador/enfermeiro');
// ===========================================
Route::resource('/recebimentos','recebimentosController')->middleware('auth')->middleware('role:cuidador/enfermeiro');
// ===========================================
Route::resource('/servico','servicosController');
Route::post('/proposta','servicosController@proposta')->middleware('auth');
Route::get('/propostaAgradecimento','servicosController@propostaAgradecimento');
Route::get('/servicosContratados','servicosController@servicosContratados')->middleware('auth')->middleware('role:solicitante');
Route::get('/servicosPrestados','servicosController@servicosPrestados')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/criarServicos','servicosController@criarServicos')->middleware('auth')->middleware('role:administrador');
Route::put('/aceitarProspostaPrestador/{id}', 'servicosController@aceitarProspostaPrestador')->middleware('auth');
Route::put('/recusarProspostaPrestador/{id}', 'servicosController@recusarProspostaPrestador')->middleware('auth');
Route::put('/aceitarPropostaSolicitante/{id}', 'servicosController@aceitarPropostaSolicitante')->middleware('auth');
Route::put('/recusarProspostaSolicitante/{id}', 'servicosController@recusarProspostaSolicitante')->middleware('auth');
Route::post('/selectProposta/{id}','servicosController@selectProposta');

// ===========================================
Route::resource('/solicitante','solicitantesController');
Route::get('/cadastroSolicitante','solicitantesController@cadastroSolicitante')->middleware('auth')->middleware('role:solicitante');
Route::get('/propostas','solicitantesController@propostas')->middleware('auth')->middleware('role:solicitante');
// ===========================================
Route::resource('/pagamentos','pagamentosController')->middleware('auth')->middleware('role:solicitante');
Route::post('/processPaymentValidation','pagamentosController@processPaymentValidation')->middleware('role:solicitante');
Route::get('/estornoPaymentValidation','pagamentosController@estornoPaymentValidation')->middleware('auth')->middleware('role:administrador');
Route::get('/paymentForm','pagamentosController@paymentForm')->middleware('auth')->middleware('role:administrador');
Route::post('/payment','pagamentosController@payment')->middleware('auth')->middleware('role:administrador');
Route::post('/estornoPayment/{id}','pagamentosController@estornoPayment')->middleware('role:solicitante');
// Route::get('/estorno','pagamentosController@estorno');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
