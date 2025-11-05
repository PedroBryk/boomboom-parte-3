<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\AlunoController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Aluno;

class AlunoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function store_cria_um_aluno_com_sucesso()
    {
        $controller = new AlunoController();

        $request = Request::create('/alunos', 'POST', [
            'nome' => 'Pedro Teste',
            'email' => 'pedro@example.com',
            'senha' => 'senha12345',
            'telefone' => '41999999999',
            'data_nascimento' => '2000-01-01',
        ]);

        $response = $controller->store($request);

        $this->assertEquals(201, $response->status());
        $this->assertDatabaseHas('aluno', ['email' => 'pedro@example.com']);
    }
}

