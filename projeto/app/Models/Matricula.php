<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Planos;


class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_inicial',
        'data_final',
        'ativa',
        'cliente_id',
        'plano_id',
        'data_pagamento',
        'status_pagamento',
    ];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class);
    }

    public function plano() 
    {
        return $this->belongsTo(Planos::class);
    }
}
