<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

class DashboardController extends Controller // implements HasMiddleware
{

    public function index(){

        $posts = Auth::user()->posts()->latest()->paginate(6); // consigo los posts del usuario ordenados por fecha y paginados mostrando 6 por página, a través de la propiedad posts del usuario atenticado.

        // $posts = Post::where('user_id', Auth::id())->get(); // consigo los posts del usuario, indicando que consiga los posts donde el 'user_id' es el 'id' del usuario autenticado. Pero en vez de esto voy a utilizar la relación uno muchos que he establecido entre User y Post para obtener los posts.

        return view('users.dashboard', ['posts' => $posts]); // y paso la información de los posts a la vista.
    }

    public function userPosts(User $user){ // función para devolver vista de los posts de un usuario. Paso modelo user como parametro para obtener datos de la instancia de usuario actual.
        $userPosts = $user->posts()->latest()->paginate(8); // igual que en index, obtenemos los posts de este usuario por orden más reciente y paginados y luego lo paso como parametro en la vista.
        return view('users.posts', [
             'posts' => $userPosts,
             'user' => $user
            ]); // paso también una variable usuario para obtener el nombre de usuario en la vista.
    }
}
