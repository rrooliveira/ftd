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
            'email' => 'required'
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
        //$temEndereco = Endereco::where('idCliente',$id)->count();
        $temEndereco = true;

        if(!$temEndereco){
            Clientes::findOrFail($id)->delete();
            return response()->json(['Msg' => 'Cliente excluído com sucesso!','Codigo' => '001'], 200);
        }else{
            return response()->json(['Error' => 'É necessário apagar primeiro o endereço!', 'Codigo' => '002'], 200);
        }
    }

    protected function convertToArray($result)
    {
        $arrayPerson = null;
        $idPerson = null;       
        
        $i = 0;
        foreach ($result as $data){
            if($data->id != $idPerson){
                $arrayPerson[$data->id]['id']                        = $data->id;
                $arrayPerson[$data->id]['name']                      = $data->name;
                $arrayPerson[$data->id]['lastname']                  = $data->lastName;
                $arrayPerson[$data->id]['birthDate']                 = $data->birthDate;
                $arrayPerson[$data->id]['Address'][$i]['id']         = $data->id_Address;
                $arrayPerson[$data->id]['Address'][$i]['postalCode'] = $data->postalCode;
                $arrayPerson[$data->id]['Address'][$i]['address']    = $data->address;
                $arrayPerson[$data->id]['Address'][$i]['complement'] = $data->complement;
                $arrayPerson[$data->id]['Address'][$i]['state']      = $data->state;
                $arrayPerson[$data->id]['Address'][$i]['country']    = $data->country;
            }else{
                $arrayPerson[$data->id]['Address'][$i]['id']         = $data->id_Address;
                $arrayPerson[$data->id]['Address'][$i]['postalCode'] = $data->postalCode;
                $arrayPerson[$data->id]['Address'][$i]['address']    = $data->address;
                $arrayPerson[$data->id]['Address'][$i]['address']    = $data->address;
                $arrayPerson[$data->id]['Address'][$i]['complement'] = $data->complement;
                $arrayPerson[$data->id]['Address'][$i]['state']      = $data->state;
                $arrayPerson[$data->id]['Address'][$i]['country']    = $data->country;
            }

            $i++;
            $idPerson = $data->id;
        }
        return $arrayPerson;
    }

}
