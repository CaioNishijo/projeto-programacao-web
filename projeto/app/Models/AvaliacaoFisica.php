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
        'cliente_id'
    ];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class);
    }
}
