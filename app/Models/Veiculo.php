<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculo';
    public $timestamps = false;
    protected $fillable = [
        'placa',
        'modelo',
        'cor',
        'tipo',
        'pessoas_id',
    ];
}
