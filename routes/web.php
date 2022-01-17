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

Route::get('/', function () {
    return view('Usuarios.Home');
})->name('tela inicial');
//Rotas referentes ao usuario
Route::get('/Usuario', 'App\Http\Controllers\UsuariosController@create');
Route::get('/Usuario/grafico', 'App\Http\Controllers\UsuariosController@grafico');
Route::post('/Usuario', 'App\Http\Controllers\UsuariosController@store')->name('Registrar_Usuario');
Route::get('/Usuario/Ver', 'App\Http\Controllers\UsuariosController@show');
Route::get('/Usuario/Editar', 'App\Http\Controllers\UsuariosController@edit');
Route::post('/Usuario/Editar', 'App\Http\Controllers\UsuariosController@update')->name('Alterar_Usuario');
Route::get('/Entrar', 'App\Http\Controllers\UsuariosController@enter')->name('fazer login');
Route::post('/logar', 'App\Http\Controllers\UsuariosController@auth')->name('Entrar');
Route::get('/logout', 'App\Http\Controllers\UsuariosController@logout');
//Rotas quiz
Route::get('/Questão', 'App\Http\Controllers\questõesController@create');
Route::post('/Questão', 'App\Http\Controllers\questõesController@store')->name('Registrar_Questão');
//Rota ver questões
Route::get('Questão/Ver', 'App\Http\Controllers\questõesController@show');
//Rota excluir questões
Route::get('/Questão/Excluir/{id}', 'App\Http\Controllers\questõesController@delete');
Route::post('/Questão/Excluir/{id}', 'App\Http\Controllers\questõesController@destroy')->name('excluir_questão');
//rotas das alternativas
Route::get('/Alternativa', 'App\Http\Controllers\alternativasController@create')->name('inserir_alternativas');
Route::post('/Alternativa', 'App\Http\Controllers\alternativasController@store')->name('Registrar_alternativas');
