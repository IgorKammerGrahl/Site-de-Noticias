<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'identificador'];  

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function noticias()
    {
        return $this->hasMany(Noticia::class);
    }
}
