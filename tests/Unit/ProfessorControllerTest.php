<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ProfessorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Professor;

class ProfessorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_retorna_um_professor_existente()
    {
        $professor = Professor::create([
            'nome' => 'Maria Souza',
            'email' => 'maria@example.com',
            'senha' => bcrypt('senha12345'),
            'telefone' => '41988887777',
            'data_nascimento' => '1980-05-10',
        ]);

        $controller = new ProfessorController();
        $response = $controller->show($professor->id);

        $this->assertEquals(200, $response->status());
        $this->assertStringContainsString('Maria Souza', $response->getContent());
    }
}
