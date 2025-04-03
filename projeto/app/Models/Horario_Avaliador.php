<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario_Avaliador extends Model
{
    use HasFactory;

    protected $fillable = [
        'avaliador_id',
        'horario_id'
    ];

    public function avaliador() 
    {
        return $this->belongsTo(Avaliador::class);
    }

    public function horario() 
    {
        return $this->belongsTo(Horario::class);
    }
}
