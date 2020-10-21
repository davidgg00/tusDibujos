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





/* Route::get('/', function () {
    return view('home');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/prueba', 'App\Http\Controllers\UsuarioController@index');
Route::post('/vuelogin', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Route::get('/', 'App\Http\Controllers\HomeController@index');


Route::get('/subirDibujo', 'App\Http\Controllers\UsuarioController@subirDibujo')->name('subirDibujo');
Route::post('/likePost/{id}', "App\Http\Controllers\PostDibujoController@like");
Route::post('/quitarlikePost/{id}', "App\Http\Controllers\PostDibujoController@quitarLike");
Route::post('/subidaDibujo', "App\Http\Controllers\PostDibujoController@subirDibujo")->name('subidaDibujo');
