<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_atividade',
        'pessoa_id'
    ];

    public function pessoa() 
    {
        return $this->belongsTo(Pessoa::class);
    }
}
