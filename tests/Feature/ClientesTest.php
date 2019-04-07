<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientesTest extends TestCase
{
    public function testExibirClientes()
    {

        $resposta = $this->call('GET', '/api/clientes');
        $resposta->assertStatus(200);
    }

    public function testeExibirCliente()
    {
        $id = 1;
        $resposta = $this->call('GET', '/api/clientes/'.$id);
        $resposta->assertStatus(200);  
    }

    public function testCadastrarCliente()
    {
        $dados = ['nome' => 'Rodrigo Oliveira',
                   'email' => 'rro.oliveir@gmail.com'
               ];

        $resposta = $this->json('POST', '/api/clientes', $dados);

        $resposta->assertStatus(201);
        $resposta->assertJson(['id' => true]);
    }

    public function testAlterarCliente()
    {
        $id = 1;
        $dados = ['email' => 'rodrigo.oliveira@gmail.com'];

        $resposta = $this->json('PUT', '/api/clientes/'.$id, $dados);

        $resposta->assertStatus(200);
        $resposta->assertJson(['id' => true]);
    }

    public function testDeletarCliente()
    {
        $id = 2;

        $resposta = $this->json('DELETE', '/api/clientes/'.$id);

        $resposta->assertStatus(200);
        $resposta->assertJson(['Msg' => true]);
    }

}
