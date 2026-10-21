<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PessoaController;

Route::post('/salvar_usuario', [UsuarioController::class, 'salvar_usuario']);
Route::put('/alterar_usuario', [UsuarioController::class, 'alterar_usuario']);
Route::delete('/deletar_usuario', [UsuarioController::class, 'deletar_usuario']);

Route::get('/ver_usuario', [UsuarioController::class, 'ver_usuario']);
Route::get('/listar_usuarios', [UsuarioController::class, 'listar_usuarios']);
Route::get('/listar_usuarios_simples', [UsuarioController::class, 'listar_usuarios_simples']);

Route::post('/salvar_funcionario', [FuncionarioController::class, 'salvar_funcionario']);
Route::put('/alterar_funcionario', [FuncionarioController::class, 'alterar_funcionario']);
Route::delete('/deletar_funcionario', [FuncionarioController::class, 'deletar_funcionario']);

Route::get('/ver_funcionario', [FuncionarioController::class, 'ver_funcionario']);
Route::get('/listar_funcionarios', [FuncionarioController::class, 'listar_funcionarios']);
Route::get('/listar_funcionarios_simples', [FuncionarioController::class, 'listar_funcionarios_simples']);

Route::post('/salvar_pessoa', [PessoaController::class, 'salvar_pessoa']);
Route::put('/alterar_pessoa', [PessoaController::class, 'alterar_pessoa']);
Route::delete('/deletar_pessoa', [PessoaController::class, 'deletar_pessoa']);

Route::get('/ver_pessoa', [PessoaController::class, 'ver_pessoa']);
Route::get('/listar_pessoas', [PessoaController::class, 'listar_pessoas']);
Route::get('/listar_pessoas_simples', [PessoaController::class, 'listar_pessoas_simples']);
