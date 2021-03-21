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
// Route::resource('/admin','AdministratorController');
Route::resource('/admin','AdministratorController')->middleware('auth')->middleware('role:administrador');
Route::get('/listaAdmins','AdministratorController@listaAdmins')->middleware('auth')->middleware('role:administrador');
Route::get('/listaServicosPrestados','AdministratorController@listaServicosPrestados')->middleware('auth')->middleware('role:administrador');
Route::get('/cadastroAdmin','AdministratorController@cadastroAdmin')->middleware('auth')->middleware('role:administrador');
Route::put('/aprovarPrestador/{id}', 'AdministratorController@aprovarPrestador')->middleware('auth')->middleware('role:administrador');
Route::put('/reprovarPrestador/{id}', 'AdministratorController@reprovarPrestador')->middleware('auth')->middleware('role:administrador');
Route::get('/prestadoresLista','AdministratorController@prestadoresLista')->middleware('auth')->middleware('role:administrador');
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
Route::resource('/paciente','PatientsController')->middleware('auth')->middleware('role:solicitante');
Route::post('/selectPacientes/{id}','PatientsController@selectPacientes')->middleware('role:solicitante');
// ===========================================
Route::resource('/prestador','CaregiversController');
Route::get('/cadastroPrestador','CaregiversController@cadastroPrestador')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/novaspropostas','CaregiversController@prestadoresPropostas')->middleware('auth')->middleware('role:cuidador/enfermeiro');
// ===========================================
Route::resource('/recebimentos','ReceiptsController')->middleware('auth')->middleware('role:cuidador/enfermeiro');
// ===========================================
Route::resource('/servico','JobsController');
Route::post('/proposta','JobsController@proposta')->middleware('auth');
Route::get('/propostaAgradecimento','JobsController@propostaAgradecimento');
Route::get('/servicosContratados','JobsController@servicosContratados')->middleware('auth')->middleware('role:solicitante');
Route::get('/servicosPrestados','JobsController@servicosPrestados')->middleware('auth')->middleware('role:cuidador/enfermeiro');
Route::get('/criarServicos','JobsController@criarServicos')->middleware('auth')->middleware('role:administrador');
Route::put('/aceitarProspostaPrestador/{id}', 'JobsController@aceitarProspostaPrestador')->middleware('auth');
Route::put('/recusarProspostaPrestador/{id}', 'JobsController@recusarProspostaPrestador')->middleware('auth');
Route::put('/aceitarPropostaSolicitante/{id}', 'JobsController@aceitarPropostaSolicitante')->middleware('auth');
Route::put('/recusarProspostaSolicitante/{id}', 'JobsController@recusarProspostaSolicitante')->middleware('auth');
Route::post('/selectProposta/{id}','JobsController@selectProposta');

// ===========================================
Route::resource('/solicitante','ClientsController');
Route::get('/cadastroSolicitante','ClientsController@cadastroSolicitante')->middleware('auth')->middleware('role:solicitante');
Route::get('/propostas','ClientsController@propostas')->middleware('auth')->middleware('role:solicitante');
// ===========================================
Route::resource('/pagamentos','PaymentsController')->middleware('auth')->middleware('role:solicitante');
Route::post('/processPaymentValidation','PaymentsController@processPaymentValidation')->middleware('role:solicitante');
Route::get('/estornoPaymentValidation','PaymentsController@estornoPaymentValidation')->middleware('auth')->middleware('role:administrador');
Route::get('/paymentForm','PaymentsController@paymentForm')->middleware('auth')->middleware('role:administrador');
Route::post('/payment','PaymentsController@payment')->middleware('auth')->middleware('role:administrador');
Route::post('/estornoPayment/{id}','PaymentsController@estornoPayment')->middleware('role:solicitante');
Route::get('/atualizarPagamentos','PaymentsController@atualizarPagamentos');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
