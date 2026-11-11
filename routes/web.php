<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro_usuario', [UsuarioController::class, 'cadastro_html'])->name('cadastro_usuario');
Route::get('/cadastro_funcionario', [FuncionarioController::class, 'cadastro_html'])->name('cadastro_funcionario');
Route::get('/login', [LoginController::class, 'login'])->name('login');
