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
Route::get('/encontrecuidador','indexController@encontrecuidador');
Route::get('/registros','indexController@registros');
Route::get('/cuidadorCidades','indexController@cuidadorCidades');
Route::get('/privacidade','indexController@privacidade');
Route::get('/agradecimento','indexController@agradecimento');
// ===========================================
Route::resource('/paciente','pacientesController')->middleware('auth');
Route::post('/selectpacientes/{id}','pacientesController@selectPacientes');
// ===========================================
Route::resource('/prestador','prestadoresController');
Route::get('/prestadorCadastro','prestadoresController@dadosCadastrais')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/resultado','prestadoresController@resultado')->middleware('auth')->middleware('role:solicitante');
Route::get('/novaspropostas','prestadoresController@prestadoresPropostas')->middleware('auth');
// ===========================================
Route::resource('/recebimentos','recebimentosController')->middleware('auth');
// ===========================================
Route::resource('/servico','servicosController');
Route::post('/proposta','servicosController@propostas')->middleware('auth');
Route::get('/propostaAgradecimento','servicosController@propostaAgradecimento');
Route::get('/servicosContratados','servicosController@servicosContratados')->middleware('auth');
Route::get('/servicosPrestados','servicosController@servicosPrestados')->middleware('auth');
Route::get('/criarServicos','servicosController@criarServicos')->middleware('auth')->middleware('role:administrador');
Route::put('/aceitarProspostaPrestador/{id}', 'servicosController@aceitarProspostaPrestador')->middleware('auth');
Route::put('/recusarProspostaPrestador/{id}', 'servicosController@recusarProspostaPrestador')->middleware('auth');
Route::put('/aceitarPropostaSolicitante/{id}', 'servicosController@aceitarPropostaSolicitante')->middleware('auth');
Route::put('/recusarProspostaSolicitante/{id}', 'servicosController@recusarProspostaSolicitante')->middleware('auth');
Route::post('/selectproposta/{id}','servicosController@selectproposta');

// ===========================================
Route::resource('/solicitante','solicitantesController');
Route::get('/solicitanteCadastro','solicitantesController@dadosCadastrais')->middleware('auth');
Route::get('/propostas','solicitantesController@solicitantePropostas')->middleware('auth');
// ===========================================
Route::resource('/pagamentos','pagamentosController')->middleware('auth');
Route::post('/processPaymentValidation','pagamentosController@processPaymentValidation');
Route::get('/estornoPaymentValidation','pagamentosController@estornoPaymentValidation')->middleware('auth')->middleware('role:administrador');
Route::get('/estorno','pagamentosController@estorno');
Route::get('/paymentForm','pagamentosController@paymentForm')->middleware('auth')->middleware('role:administrador');
Route::post('/payment','pagamentosController@payment');
Route::post('/estornoPayment/{id}','pagamentosController@estornoPayment');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
