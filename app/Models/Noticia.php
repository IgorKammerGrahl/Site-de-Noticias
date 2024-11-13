<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo', 'empresa_id', 'user_id'];

    protected $dates = ['created_at', 'updated_at'];
}
