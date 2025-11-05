<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'aluno';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'data_nascimento',
        'tipo_cliente',
        'saudacao_vip'
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    
    public function getAuthPassword()
    {
        return $this->senha;
    }

    //Um aluno pertence a um professor

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}

