<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AlunoSeeder::class);

        $this->call(ProfessorSeeder::class);

        $this->call(TreinoSeeder::class);

        $this->call(AulaSeeder::class);

        $this->call(AdministradorSeeder::class);
    }
}
