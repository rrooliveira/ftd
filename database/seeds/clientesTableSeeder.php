<?php

use Illuminate\Database\Seeder;
use App\Clientes;

class clientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nomes = ['Jose', 'Maria' , 'Renato', 'Laura' , 'Serafim' , 'Joao' , 'Bruna' , 'Rubens', 'Paulo' , 'Ana'];
        
        $qtdnomes = count($nomes);

       for ($i=0; $i < $qtdnomes; $i++) { 
	    	Clientes::create([
	            'nome' => $nomes[$i],
	            'email' => strtolower($nomes[$i]).'@gmail.com',
	        ]);
    	}
    }
}
