<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoFisica extends Model
{
    use HasFactory;

    protected $fillable = [
        'altura_cliente',
        'peso_cliente',
        'data_marcada',
        'foi_realizada',
        'cliente_id',
        'horario_id',
        'avaliador_id'
    ];

    public function cliente() 
    {
        return $this->belongsTo(User::class);
    }

    public function avaliador() 
    {
        return $this->belongsTo(Avaliador::class);
    }

    public function horario() 
    {
        return $this->belongsTo(Horario::class);
    }
}
