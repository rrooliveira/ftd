<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClientesController extends Controller
{
    public function exibirTodos()
    {
        return response()->json(Clientes::all());
    }
}
