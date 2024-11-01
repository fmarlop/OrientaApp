<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Mail\WelcomeMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware // es interesante implementar la interfaz HasMiddleware en caso de querer añadir funcionalidad más compleja al control de acceso a rutas.
{

    // función para implementar la interfaz HasMiddleware. Está en la documentación de Laravel https://laravel.com/docs/11.x/controllers#controller-middleware
    public static function middleware(): array
    {
        return [
            // new Middleware('auth', only: ['store']),
            new Middleware('auth', except: ['index', 'show']),
        ]; // En este array podemos aplicar middleware o middleware condicionales.
    }
    // con esta función nos aseguramos de que primero el usuario está autenticado para las funciones indicadas, si no lo está será redirigido a login, si lo está entonces ya se chequearás las Policies de las funciones que las tengan.

    /**
     * Display a listing of the resource. Listar los posts.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(8); // obtengo todos los posts en la base de datos ordenados por fecha de creación, con 8 posts por página y los guardo en la variable $posts. "latest()" es igual a "orderBy('created_at', 'desc')".

        return view('posts.index', ['posts' => $posts]); // a la función view podemos pasarle como segundo argumento un array de datos, que luego podremos mostrar.
    } 

    /**
     * Show the form for creating a new resource. Renderizar el formulario que el usuario usará para crear el post.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage. Guardar el post en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'mimes:jpg,png,webp', 'max:3000'] // campo image no requerido, es un archivo, con las extensiones especificadas y máximo 3000 kilobytes (3 megabytes más o menos). 
        ]);

        // Guardar imagen si existe
        $path = null;
        if ($request->hasFile('image')){
            $path = Storage::disk('public')->put('posts_images', $request->image); // método 'put()' para almacenar la imagen en el directorio especificado (public/storage/posts_images). Laravel da a las imágenes un nombre único automáticamente. Función disk para que vaya a la carpeta public. Para cambiar donde se almacena por defecto, o si es público o privado ir a config/filesystems. Y si quiero que en vez de estar en el directorio /storage/app/public/posts_images esté en /public, que es la única carpeta que será realmente pública cuando se lance la aplicación, tengo que crear un link simbólico con comando 'php artisan storage:link'.
        }
        $fields["image"] = $path; // cambiar el valor de la clave image;

        // Crear post
        $post = Auth::user()->posts()->create($fields); // creo un post a través de la instancia del usuario al que le pasamos también los campos que hemos almacenado en $fields.
        // Post::create([ 'user_id' => Auth::id(), ...$fields]); // podría pasar directamente el 'user_id' que corresponde al usuario autenticado. '...' es un operador de esparcimiento para que la función create() siga tomando el resto de valores guardados en $fields.
        
        // Enviar email
        Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(), $post)); // enviar mail al usuario autenticado con la información del post que acaba de crear.

        // Redireccionar usuario al panel
        return back()->with('success', 'Tu post se ha publicado'); // con esta función with() puedo introducir dos argumentos llave valor que luego podré mostrar en pantalla.
    }

    /**
     * Display the specified resource. Renderizar post individual.
     */
    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource. Renderizar formulario para actualizar un post.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify', $post); // uso función 'authorize()' para que solo el propietario de el post pueda ver esta página. Le paso como argumentos el nombre la función modify y la instancia del post, la instancia del usuario es pasada automáticamente por Laravel.
        return view('posts.edit', [ 'post' => $post ] );
    }

    /**
     * Update the specified resource in storage. Actualizar post y guardarlo en la base de datos.
     */
    public function update(Request $request, Post $post)
    {
        // Autorizar la acción
        Gate::authorize('modify', $post);

        // Validar
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'mimes:jpg,png,webp', 'max:3000' ]
        ]);

        // Guardar imagen si existe
        $path = $post->image ?? null; // operador ??, obtendrá valor a la izquierda si es true y sino el de la derecha.
        if ($request->hasFile('image')){
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }
        $fields["image"] = $path;
 
        // Actualizar post
        $post->update($fields); // método update que busca un array con nuevos valores.

        // Redireccionar usuario al panel
        return redirect()->route('dashboard')->with('success', 'Tu post se ha actualizado'); // con esta función with() puedo introducir dos argumentos llave valor que luego podré mostrar en pantalla.
    }

    /**
     * Remove the specified resource from storage. Eliminar un post.
     */
    public function destroy(Post $post)
    {
        // Autorizar la acción
        Gate::authorize('modify', $post);

        // Borrar imagen del post si existe
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Borrar el post
        $post->delete(); 

        // Redirigir al panel
        return back()->with('delete', 'Tu post se ha borrado'); // redirigimos al usuario al panel, junto a un mensaje flash.
    }
}
