<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enderecos;
use App\Clientes;

class EnderecosController extends Controller
{
     public function exibirTodos()
    {
        return response()->json(Enderecos::all(),200);
    }

    public function exibirEndereco($id)
    {
        return response()->json(Enderecos::find($id));
    }

    public function cadastrarEndereco(Request $request)
    {        
        $this->validate($request, [
            'id_cliente' => 'required',
            'cep' 		 => 'required',
            'logradouro' => 'required',
            'numero'     => 'required',
            'uf'         => 'required'
        ]);

        $idCliente = (int)$request->id_cliente;

        //Verifica se o cliente existe na tabela de Clientes
        $existe = Clientes::where('id',$idCliente)->count();

        if($existe){
            $data = [
                'id_cliente'  => $request->id_cliente,
                'cep' 		  => $request->cep,
                'logradouro'  => $request->logradouro,
                'numero'      => (int) $request->numero,
                'complemento' => $request->complemento,
                'uf'      	  => $request->uf
            ];

            $endereco = Enderecos::create($data);
            return response()->json($endereco, 201);
        }else{
        	return response()->json(['Error' => 'O c&oacute;digo do cliente informado n&atilde;o existe!', 'Codigo' => '002'], 400);
        }
    }

    public function atualizarEndereco($id, Request $request)
    {
        $id = (int) $id;

        $endereco = Enderecos::findOrFail($id);
        
        $endereco->update($request->all());

        return response()->json($endereco, 200);
    }

    public function deletarEndereco($id)
    {
        $id = (int) $id;

        Enderecos::findOrFail($id)->delete();
        
        return response()->json(['Msg' => 'Endere&ccedil;o exclu&iacute;do com sucesso!', 'Codigo' => '001'], 200);
    }
}
