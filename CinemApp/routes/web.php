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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/reservas', 'ReservasController')->names('reservas');
Route::resource('/peliculas', 'PeliculasController')->names('peliculas');

Route::get('/funciones', 'FuncionesController@find')->name('funciones');
Route::get('/funciones/{id}/reservar', 'FuncionesController@reservar')->name('reservarFuncion');
Route::get('/reservas/{id}/pagar', 'ReservasController@confirmarPagarReserva')->name('pagarReserva');
Route::post('/reservas/{id}/pagar', 'ReservasController@pagarReserva')->name('pagarReserva');


