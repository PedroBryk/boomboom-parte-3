<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'professor';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'data_nascimento',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

   
    public function getAuthPassword()
    {
        return $this->senha;
    }

    // Um professor tem muitos alunos
    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

}

