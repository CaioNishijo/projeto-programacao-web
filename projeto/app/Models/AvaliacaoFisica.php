<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoFisica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'altura_cliente',
        'peso_cliente',
        'cliente_id'
    ];
}
