<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\questõesController;
use App\Http\Controllers\alternativasController;
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
Route::get('/Usuario', [UsuariosController::class, 'create']);
Route::post('/Usuario', [UsuariosController::class, 'store'])->name('Registrar_Usuario');
Route::get('/Usuario/Ver', [UsuariosController::class, 'show']);
Route::get('/Usuario/Editar', [UsuariosController::class, 'edit']);
Route::post('/Usuario/Editar', [UsuariosController::class, 'update'])->name('Alterar_Usuario');
Route::get('/Entrar', [UsuariosController::class, 'enter'])->name('fazer login');
Route::post('/logar', [UsuariosController::class, 'auth'])->name('Entrar');
Route::get('/logout', [UsuariosController::class, 'logout']);
//Rotas quiz
Route::get('/Questão', [questõesController::class, 'create']);
Route::post('/Questão', [questõesController::class, 'store'])->name('Registrar_Questão');
//Rota ver questões
Route::get('Questão/Ver', [questõesController::class, 'show']);
//Rota excluir questões
Route::get('/Questão/Excluir/{id}', [questõesController::class, 'delete']);
Route::post('/Questão/Excluir/{id}', [questõesController::class, 'destroy'])->name('excluir_questão');
//rotas das alternativas
Route::get('/Alternativa',[alternativasController::class, 'create'])->name('inserir_alternativas');
Route::post('/Alternativa', [alternativasController::class, 'store'])->name('Registrar_alternativas');
