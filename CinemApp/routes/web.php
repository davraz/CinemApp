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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/funciones', 'FuncionesController@find');
Route::resource('/reservas', 'ReservasController');
Route::get('/reservas/{id}/pagar', 'ReservasController@confirmarPagarReserva');
Route::post('/reservas/{id}/pagar', 'ReservasController@pagarReserva');

Route::get('/reservarFunciones', 'ReservaController@index');
Route::post('/reservarFunciones/reserva', 'ReservaController@reserva');