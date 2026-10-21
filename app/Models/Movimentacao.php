<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacao';
    public $timestamps = false;
    protected $fillable = [
        'data_hora_entrada',
        'data_hora_saida',
        'pessoas_id',
        'vagas_id',
    ];
}
