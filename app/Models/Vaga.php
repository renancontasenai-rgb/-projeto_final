<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vaga';
    public $timestamps = false;
    protected $fillable = [
        'numero',
        'tipo',
        'estacionamentosesi_id',
    ];
}
