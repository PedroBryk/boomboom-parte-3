<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aula')->insert([

            [
                'nome' => 'Pilates',
                'descricao' => 'Alongamentos',
                'aluno_id' => 1,       // id do aluno já cadastrado
                'professor_id' => 1,  // id do professor já cadastrado
                'data_aula' => '2025-01-01',   
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
