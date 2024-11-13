<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'empresa_id'];

    // Definindo a relação com a empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
