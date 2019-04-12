<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;

class LivrosController extends Controller
{
    public function exibirTodos()
    {
    	/*
        if ($livros = Redis::get('livros.todos')) {
            return json_decode($livros, 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }
 
        // Retorna todos os livros
        $livros = Livros::all();
        
        // Armazena os dados no Redis no período de 24 horas
        Redis::setex('livros.todos', 60 * 60 * 24, $livros);
     
        // Retorna todos os livros
        return response()->json($livros, 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        */

        // Retorna todos os livros
        $livros = Livros::all();
        $arrayLivros = $this->convertArray($livros);
        
        // Retorna todos os livros
        return response()->json($arrayLivros, 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);    	
    }

    public function exibirLivro($isbn)
    {
		$livro = Livros::where('isbn', $isbn)->first();
		$livro['author']     = explode(',', $livro['author']);
		$livro['discipline'] = explode(',', $livro['discipline']);

        return response()->json($livro, 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }

     public function cadastrarLivro(Request $request)
    {
        if(!Empty($request->isbn) && !Empty($request->title) && !Empty($request->author) && !Empty($request->level) && !Empty($request->discipline) && !Empty($request->price))
        {
	        $retornoLivro = Livros::create($request->all());
	        $retornoLivro['author']     = explode(',', $retornoLivro['author']);
			$retornoLivro['discipline'] = explode(',', $retornoLivro['discipline']);

        	return response()->json($retornoLivro, 201, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
       }else{
        	return response()->json(['Erro' => 'Os seguintes campos s&atilde;o necess&aacute;rios (isbn, title, author, level, discipline e price)','Codigo' => '002'], 400);
        }
    }

    public function atualizarLivro($id, Request $request)
    {
        $id = (int) $id;

        if(!Empty($request->isbn) || !Empty($request->title) || !Empty($request->author) || !Empty($request->level) || !Empty($request->discipline) || !Empty($request->price))
        {

            $livro = Livros::find($id);

            if($livro){
            
	            $livro->update($request->all());
	            $livro['author']     = explode(',', $livro['author']);
				$livro['discipline'] = explode(',', $livro['discipline']);

	            return response()->json($livro, 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
	        }else{
	        	return response()->json(['Erro' => 'Livro n&atilde;o localizado!','Codigo' => '002'], 400);
	        }
        }
    }

    public function deletarLivro($id)
    {
        $id = (int) $id;

        $livro = Livros::find($id);
       	
       	if($livro){
            $livro->delete();
	    
	        return response()->json(['Msg' => 'Livro exclu&iacute;do com sucesso!','Codigo' => '001'], 200);
	    }else{
	    	return response()->json(['Erro' => 'Livro n&atilde;o localizado!','Codigo' => '002'], 400);
	    }
       
    }

    private function convertArray($dados)
    {
    	$arrayLivros;
    	if(!empty($dados) && $dados !== null){
			foreach ($dados as $livro){
	        	$arrayLivros[] = [
	        		'id' 		 => $livro['id'],
	        		'isbn' 		 => $livro['isbn'],
	        		'title'		 => $livro['title'],
	        		'cover'		 => $livro['cover'],
		        	'author'     => explode(',', $livro['author']),
		       		'level'		 => $livro['level'],
		       		'discipline' => explode(',', $livro['discipline']),
		       		'price'		 => $livro['price']
				];
			}
		}
		return $arrayLivros;
    }
}
