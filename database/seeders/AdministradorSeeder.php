<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrador')->insert([

            [
                'nome' => 'Admin',
                'senha' => Hash::make('senha123'),
                'email' => 'admin@academia.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
