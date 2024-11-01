<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id', // se podría añadir este campo manualmente aquí porque es uno de los campos requeridos en la base de datos para asociar cada post con un usuario, pero en vez de eso pasaré el user_id directamente en el PostController cuando se crea un post.
        'title',
        'body',
        'image',
    ];

    public function comments() : HasMany { 
        return $this->hasMany(Comment::class); // cada instancia de post tiene muchas instancias de comment.
    }

    public function user() : BelongsTo // creo esta función porque post y user tienen una relación "uno muchos", en el que un usuario puede tener muchos posts. No es necesario especificar que esta función devuelve BelongsTo pero para dejarlo claro, y que tiene que ser importada. 
    {
        return $this->belongsTo(User::class); // cada instancia de post pertenece a una instancia de usuario.
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class); // cada instancia de comment pertenece a una instancia de usuario.
    }
}
