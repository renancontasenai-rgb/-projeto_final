<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'tipo',
        'cpf',
        'telefone',
    ];
}
