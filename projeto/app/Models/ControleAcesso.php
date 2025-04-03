<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleAcesso extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_passagem',
        'cliente_id'
    ];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class);
    }
}
