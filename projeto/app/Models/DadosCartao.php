<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosCartao extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'numero',
        'data_validade',
        'cvv',
        'cliente_id'
    ];
}
