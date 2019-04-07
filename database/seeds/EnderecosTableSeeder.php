<?php

use Illuminate\Database\Seeder;
use App\Enderecos;
use App\Clientes;

class EnderecosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = Clientes::all();

        foreach($clientes as $cliente){
			Enderecos::create([
	            'id_cliente' => $cliente->id,
	            'cep' => '99999999',
	            'logradouro' => 'Rua do cliente ' . $cliente->nome,
	            'numero' => $cliente->id,
	            'complemento' => 'Complemento do cliente ' . $cliente->nome,
	            'uf' => 'SP'
	        ]);        	
        }
    }
}
