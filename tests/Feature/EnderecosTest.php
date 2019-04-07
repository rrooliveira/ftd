<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Enderecos;

class EnderecosTest extends TestCase
{
    public function testExibirEnderecos()
    {

        $resposta = $this->call('GET', '/api/enderecos');
        $resposta->assertStatus(200);
    }

    public function testeExibirEndereco()
    {
        $id = 1;
        $resposta = $this->call('GET', '/api/enderecos/'.$id);
        $resposta->assertStatus(200);  
    }

    public function testCadastrarEndereco()
    {
        $dados = ['id_cliente' => 51,
                   'cep' => '0000000',
                   'logradouro' => 'Avenida Brasil',
                   'numero' => '2019',
                   'complemento' => null,
                   'uf' => 'SP' 
               ];

        $resposta = $this->json('POST', '/api/enderecos', $dados);

        $resposta->assertStatus(201);
        $resposta->assertJson(['id' => true]);
    }

    public function testAlterarEndereco()
    {
        $id = 1;
        $dados = ['cep' => '01102000'];

        $resposta = $this->json('PUT', '/api/enderecos/'.$id, $dados);

        $resposta->assertStatus(200);
        $resposta->assertJson(['id' => true]);
    }

    public function testDeletarEndereco()
    {
        $id = 2;

        $resposta = $this->json('DELETE', '/api/enderecos/'.$id);

        //dump($resposta->getContent());
        $resposta->assertStatus(200);
        $resposta->assertJson(['Msg' => true]);
    }
}
