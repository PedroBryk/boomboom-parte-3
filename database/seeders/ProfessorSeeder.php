<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professor')->insert([

            [
                'nome' => 'Leonardo',
                'senha' => Hash::make('senha123'),
                'email' => 'leonardo@academia.com',
                'telefone' => '123456787',
                'data_nascimento' => '1980-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
