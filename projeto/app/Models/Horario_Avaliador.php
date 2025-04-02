<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario_Avaliador extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'avaliador_id',
        'horario_id'
    ];
}
