<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_inicial',
        'data_final',
        'status',
        'cliente_id',
        'plano_id'
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
