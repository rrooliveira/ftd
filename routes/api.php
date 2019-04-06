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

