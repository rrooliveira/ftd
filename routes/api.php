<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Livros
Route::get('/livros', 			['uses' => 'LivrosController@exibirTodos']);
Route::get('/livros/{isbn}',  	['uses' => 'LivrosController@exibirLivro']);
Route::post('/livros', 	    	['uses' => 'LivrosController@cadastrarLivro']);
Route::put('/livros/{id}',    	['uses' => 'LivrosController@atualizarLivro']);
Route::delete('/livros/{id}', 	['uses' => 'LivrosController@deletarLivro']);

// Clientes
Route::get('/clientes', 		['uses' => 'ClientesController@exibirTodos']);
Route::get('/clientes/{id}',    ['uses' => 'ClientesController@exibirCliente']);
Route::post('/clientes', 	    ['uses' => 'ClientesController@cadastrarCliente']);
Route::put('/clientes/{id}',    ['uses' => 'ClientesController@atualizarCliente']);
Route::delete('/clientes/{id}', ['uses' => 'ClientesController@deletarCliente']);

// Enderecos
Route::get('/enderecos',  	   	 ['uses' => 'EnderecosController@exibirTodos']);
Route::get('/enderecos/{id}', 	 ['uses' => 'EnderecosController@exibirEndereco']);
Route::post('/enderecos', 	   	 ['uses' => 'EnderecosController@cadastrarEndereco']);
Route::put('/enderecos/{id}', 	 ['uses' => 'EnderecosController@atualizarEndereco']);
Route::delete('/enderecos/{id}', ['uses' => 'EnderecosController@deletarEndereco']);