<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estacionamentosesi extends Model
{
    protected $table = 'estacionamentosesi';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'endereco',
        'capacidade',
    ];
}
