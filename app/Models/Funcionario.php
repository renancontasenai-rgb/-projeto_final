<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    public $timestamps = false;
    protected $fillable = [
        'cargo',
        'departamento',
        'data_admissao',
        'usuarios_id',
    ];

}
