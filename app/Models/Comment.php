<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id', // se podría añadir este campo manualmente aquí porque es uno de los campos requeridos en la base de datos para asociar cada post con un usuario, pero en vez de eso pasaré el user_id directamente en el PostController cuando se crea un post.
        'body',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class); // cada instancia de comment pertenece a una instancia de usuario.
    }

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class); // cada instancia de comment pertenece a una instancia de post.
    }
}
