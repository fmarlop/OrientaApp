<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Es necesario usar estas clases Policies porque hay vistas en la navegación donde no solo es necesario estar autenticado para acceder sino que el usuario autenticado tenga autorización para acceder.
     */
    public function modify(User $user, Post $post) : bool {
        return $user->id === $post->user_id; // compruebo que el post pertenece al usuario autenticado.
    }

}
