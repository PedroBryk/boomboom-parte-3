<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfessorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function deve_criar_um_professor()
    {
        $dados = [
            'nome' => 'Pedro Bryk',
            'email' => 'pedro@teste.com',
            'senha' => '12345678',
            'telefone' => '123456789',
            'data_nascimento' => '2000-01-01',
        ];

        $response = $this->postJson('/professores', $dados);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => 'Pedro Bryk']);

        $this->assertDatabaseHas('professores', ['email' => 'pedro@teste.com']);
    }

    /** @test */
    public function deve_retornar_um_professor()
    {
        $professor = Professor::factory()->create();

        $response = $this->getJson("/professores/{$professor->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['email' => $professor->email]);
    }

    /** @test */
    public function deve_atualizar_um_professor()
    {
        $professor = Professor::factory()->create([
            'nome' => 'Antigo Nome'
        ]);

        $response = $this->putJson("/professores/{$professor->id}", [
            'nome' => 'Novo Nome'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => 'Novo Nome']);
    }

    /** @test */
    public function deve_excluir_um_professor()
    {
        $professor = Professor::factory()->create();

        $response = $this->deleteJson("/professores/{$professor->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Professor deletado com sucesso']);

        $this->assertDatabaseMissing('professores', ['id' => $professor->id]);
    }
}
