<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\belongsTo;
use app\Models\usuario;

class usuariotoken extends Model
{
    protected $table = 'usuario_token';
    protected $fillable = [
        'usuario_id',
        'token',
        'validade'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario ::class, 'usuario_id');
    }

}
