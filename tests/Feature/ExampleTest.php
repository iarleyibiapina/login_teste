<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function redirecionar_login_caso_usuario_nao_esteja_logado(): void
    {
        // teste simples para saber se usuario logado
        $response =
            $this
            ->get('/tentandoEntrar')
            ->assertRedirect('/login');
    }


    /**
     *  @test
     */
    public function retorno_resposta_json(): void
    {
        // filtrando testes
        // test --filter 'nome'        
        $response =
            $this
            ->get('/return-get-teste')
            ->assertJson([
                'message' => 'success'
            ]);
    }
}
