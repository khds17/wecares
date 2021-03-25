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
Route::resource('/admin','AdmintradoresController');
// Route::resource('/admin','AdmintradoresController')->middleware('auth')->middleware('role:administrador');
Route::get('/listaAdmins','AdmintradoresController@listaAdmins')->middleware('auth')->middleware('role:administrador');
Route::get('/listaServicosPrestados','AdmintradoresController@listaServicosPrestados')->middleware('auth')->middleware('role:administrador');
Route::get('/cadastroAdmin','AdmintradoresController@cadastroAdmin')->middleware('auth')->middleware('role:administrador');
Route::put('/aprovarPrestador/{id}', 'AdmintradoresController@aprovarPrestador')->middleware('auth')->middleware('role:administrador');
Route::put('/reprovarPrestador/{id}', 'AdmintradoresController@reprovarPrestador')->middleware('auth')->middleware('role:administrador');
Route::get('/prestadoresLista','AdmintradoresController@prestadoresLista')->middleware('auth')->middleware('role:administrador');
// ===========================================
Route::resource('/','IndexController');
Route::get('/sobre','IndexController@sobre');
Route::get('/termos','IndexController@termos');
Route::get('/conduta','IndexController@conduta');
Route::get('/encontreCuidador','IndexController@encontreCuidador');
Route::get('/registros','IndexController@registros');
Route::get('/cuidadorCidades','IndexController@cuidadorCidades');
Route::get('/privacidade','IndexController@privacidade');
Route::get('/agradecimento','IndexController@agradecimento');
Route::get('/resultado','IndexController@resultado')->middleware('auth')->middleware('role:solicitante');
// ===========================================
Route::resource('/paciente','PacientesController')->middleware('auth')->middleware('role:solicitante');
Route::post('/selectPacientes/{id}','PacientesController@selectPacientes')->middleware('role:solicitante');
// ===========================================
Route::resource('/prestador','PrestadoresController');
Route::get('/cadastroPrestador','PrestadoresController@cadastroPrestador')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/novaspropostas','PrestadoresController@prestadoresPropostas')->middleware('auth')->middleware('role:cuidador/enfermeiro');
// ===========================================
Route::resource('/recebimentos','RecebimentosController')->middleware('auth')->middleware('role:cuidador/enfermeiro');
// ===========================================
Route::resource('/servico','ServicosController');
Route::post('/proposta','ServicosController@proposta')->middleware('auth');
Route::get('/propostaAgradecimento','ServicosController@propostaAgradecimento');
Route::get('/servicosContratados','ServicosController@servicosContratados')->middleware('auth')->middleware('role:solicitante');
Route::get('/servicosPrestados','ServicosController@servicosPrestados')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/criarServicos','ServicosController@criarServicos')->middleware('auth')->middleware('role:administrador');
Route::put('/aceitarProspostaPrestador/{id}', 'ServicosController@aceitarProspostaPrestador')->middleware('auth');
Route::put('/recusarProspostaPrestador/{id}', 'ServicosController@recusarProspostaPrestador')->middleware('auth');
Route::put('/aceitarPropostaSolicitante/{id}', 'ServicosController@aceitarPropostaSolicitante')->middleware('auth');
Route::put('/recusarProspostaSolicitante/{id}', 'ServicosController@recusarProspostaSolicitante')->middleware('auth');
Route::post('/selectProposta/{id}','ServicosController@selectProposta');

// ===========================================
Route::resource('/solicitante','SolicitantesController');
Route::get('/cadastroSolicitante','SolicitantesController@cadastroSolicitante')->middleware('auth')->middleware('role:solicitante');
Route::get('/propostas','SolicitantesController@propostas')->middleware('auth')->middleware('role:solicitante');
// ===========================================
Route::resource('/pagamentos','PagamentosController')->middleware('auth')->middleware('role:solicitante');
Route::post('/processPaymentValidation','PagamentosController@processPaymentValidation')->middleware('role:solicitante');
Route::get('/estornoPaymentValidation','PagamentosController@estornoPaymentValidation')->middleware('auth')->middleware('role:administrador');
Route::get('/paymentForm','PagamentosController@paymentForm')->middleware('auth')->middleware('role:administrador');
Route::post('/payment','PagamentosController@payment')->middleware('auth')->middleware('role:administrador');
Route::post('/estornoPayment/{id}','PagamentosController@estornoPayment')->middleware('role:solicitante');
Route::get('/atualizarPagamentos','PagamentosController@atualizarPagamentos');

Auth::routes(['register' => false]);
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
