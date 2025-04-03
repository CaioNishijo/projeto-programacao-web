<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'imc',
        'avaliacao_fisica_id'
    ];

    public function avaliacao_fisica() 
    {
        return $this->belongsTo(AvaliacaoFisica::class);
    }

}
