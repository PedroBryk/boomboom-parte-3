<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->id(); // id PRIMARY KEY, auto-increment
            $table->string('nome', 100); 
            $table->string('descricao', 500); 
            $table->foreignId('aluno_id')->constrained('aluno')->onDelete('cascade');
            $table->foreignId('professor_id')->constrained('professor')->onDelete('cascade');
            $table->date('data_aula')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
