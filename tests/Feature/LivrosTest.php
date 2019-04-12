<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivrosTest extends TestCase
{
    public function testExibirLivros()
    {

        $resposta = $this->call('GET', '/api/livros');
        $resposta->assertStatus(200);
    }

    public function testeExibirLivro()
    {
        $isbn = 7898592131010;
        $resposta = $this->call('GET', '/api/livros/'.$isbn);
        $resposta->assertStatus(200);  
    }

    public function testCadastrarLivro()
    {
        $dados = ['isbn' => '1234567891234',
                   'title' => 'Teste API Laravel',
                   'cover' => 'https://github.com/rrooliveira',
                   'author' => 'Rodrigo Ruy Oliveira',
                   'level' => 'Ensino Superior',
                   'discipline' => 'Banco de Dados',
                   'price' => '999.99'
               ];

        $resposta = $this->json('POST', '/api/livros', $dados);

        $resposta->assertStatus(201);
        $resposta->assertJson(['id' => true]);
    }

    public function testAlterarLivro()
    {
        $id = 1;
        $dados = ['author' => 'Rodrigo,Ruy,Oliveira'];

        $resposta = $this->json('PUT', '/api/livros/'.$id, $dados);

        $resposta->assertStatus(200);
        $resposta->assertJson(['id' => true]);
    }

    public function testDeletarLivro()
    {
        $id = 2;

        $resposta = $this->json('DELETE', '/api/livros/'.$id);

        $resposta->assertStatus(200);
        $resposta->assertJson(['Msg' => true]);
    }

}
