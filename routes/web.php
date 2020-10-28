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
Route::get('/mejoresDibujos', 'App\Http\Controllers\PostDibujoController@mejoresDibujos')->name('mejoresDibujos');
Route::get('/aleatorio', 'App\Http\Controllers\PostDibujoController@randomDibujos')->name('random');
Route::get('/post/{id}', 'App\Http\Controllers\PostDibujoController@index')->name('post');

Route::post('/likePost/{id}', "App\Http\Controllers\PostDibujoController@like");
Route::post('/quitarlikePost/{id}', "App\Http\Controllers\PostDibujoController@quitarLike");
Route::post('/subidaDibujo', "App\Http\Controllers\PostDibujoController@subirDibujo")->name('subidaDibujo');
Route::post('/comentar', "App\Http\Controllers\PostDibujoController@comentar")->name('comentar');
