<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClientesController extends Controller
{
	//Método para exibir todos os clientes
    public function exibirTodos()
    {
        return response()->json(Clientes::all());
    }

    public function exibirCliente($id)
    {
        return response()->json(Clientes::find($id));
    }

    public function cadastrarCliente(Request $request)
    {
    	
        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required|email'
        ]);

        $cliente = Clientes::create($request->all());

        return response()->json($cliente, 201);
    }

    public function atualizarCliente($id, Request $request)
    {
        $id = (int) $id;

        if(!Empty($request->nome) || !Empty($request->email))
        {

            $cliente = Clientes::findOrFail($id);
            
            $cliente->update($request->all());

            return response()->json($cliente, 200);
        }
    }

    public function deletarCliente($id)
    {
        $id = (int) $id;

        //Verifica se o cliente tem endereço
        $temEndereco = Endereco::where('id_cliente',$id)->count();

        if(!$temEndereco){
            Clientes::findOrFail($id)->delete();
            return response()->json(['Msg' => 'Cliente excluído com sucesso!','Codigo' => '001'], 200);
        }else{
            return response()->json(['Error' => 'É necessário apagar primeiro o endereço!', 'Codigo' => '002'], 400);
        }
    }
}
