<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treino')->insert([

            [
                'nome' => 'Treino de Força',
                'descricao' => 'Treino focado em musculação para força',
                'aluno_id' => 1,       // id do aluno já cadastrado
                'professor_id' => 1,   // id do professor já cadastrado
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
