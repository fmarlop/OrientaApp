<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProFam extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id', // se podría añadir este campo manualmente aquí porque es uno de los campos requeridos en la base de datos para asociar cada post con un usuario, pero en vez de eso pasaré el user_id directamente en el PostController cuando se crea un post.
        'name',
        'desc',
        'image',
    ];
}