<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Enderecos;
use App\Clientes;

class EnderecosController extends Controller
{
    public function exibirTodos()
    {
        //DESCOMENTE PARA UTILIZAR COM O REDIS
        /*
        if ($enderecos = Redis::get('enderecos.todos')) {
            return json_decode($enderecos, 200);
        }
 
        // Retorna todos os clientes
        $enderecos = Enderecos::all();
        
        // Armazena os dados no Redis no período de 24 horas
        Redis::setex('enderecos.todos', 60 * 60 * 24, $enderecos);
     
        // Retorna todos os clientes
        return response()->json($enderecos, 200);
        */

        // Retorna todos os clientes
        $enderecos = Enderecos::all();
        // Retorna todos os clientes
        return response()->json($enderecos, 200);
    }

    public function exibirEndereco($id)
    {
        return response()->json(Enderecos::find($id), 200);
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
