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

//Route Clientes
Route::get('/clientes', 		['uses' => 'ClientesController@exibirTodos']);
Route::get('/clientes/{id}',    ['uses' => 'ClientesController@exibirCliente']);
Route::post('/clientes', 	    ['uses' => 'ClientesController@cadastrarCliente']);
Route::put('/clientes/{id}',    ['uses' => 'ClientesController@atualizarCliente']);
Route::delete('/clientes/{id}', ['uses' => 'ClientesController@deletarCliente']);

//Route Enderecos
Route::get('/enderecos',  	   	 ['uses' => 'EnderecosController@exibirTodos']);
Route::get('/enderecos/{id}', 	 ['uses' => 'EnderecosController@exibirEndereco']);
Route::post('/enderecos', 	   	 ['uses' => 'EnderecosController@cadastrarEndereco']);
Route::put('/enderecos/{id}', 	 ['uses' => 'EnderecosController@atualizarEndereco']);
Route::delete('/enderecos/{id}', ['uses' => 'EnderecosController@deletarEndereco']);

