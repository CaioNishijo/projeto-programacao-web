<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'horario',
        'avaliador_id'
    ];

    public function avaliador() 
    {
        return $this->belongsTo(Avaliador::class);
    }
}
