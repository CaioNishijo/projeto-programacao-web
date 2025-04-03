<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendente extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id'
    ];

    public function pessoa() 
    {
        return $this->belongsTo(Pessoa::class);
    }
}
