<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Models\Usuario;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'usuario_id',
        'nivel_acesso',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
