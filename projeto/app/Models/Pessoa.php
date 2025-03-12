<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'sobrenome',
        'genero',
        'cpf',
        'data_nascimento',
        'endereco',
        'numero_celular',
        'email'
    ];
}
