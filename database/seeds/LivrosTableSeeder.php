<?php

use Illuminate\Database\Seeder;
use App\Livros;

class LivrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
		$response = $client->request('GET', 'http://dev.ftd.digital/doc/mockdata.json');

		if($response->getStatusCode() == 200){
			$livros = $response->getBody();
			$livros = json_decode($livros, TRUE);

			foreach($livros as $livro){

				//AUTHOR
				$authors = '';
				$qtdAut = count($livro['author']);
				for($i = 0; $i < $qtdAut; $i++){
					$authors .=  $livro['author'][$i] . ',';
				}
				$authors = substr($authors, 0, -1);

				//DISCIPLINES
				$disciplines = '';
				$qtdDisc = count($livro['discipline']);
				for($i = 0; $i < $qtdDisc; $i++){
					$disciplines .=  $livro['discipline'][$i] . ',';
				}
				$disciplines = substr($disciplines, 0, -1);

				Livros::create([
		            'isbn' 		 => $livro['isbn'],
		            'title' 	 => $livro['title'],
		            'cover' 	 => $livro['cover'],
		            'author' 	 => $authors,
		            'level' 	 => $livro['level'],
		            'discipline' => $disciplines,
		            'price' 	 => $livro['price']
		        ]);
			}  
	    }
    }
}
