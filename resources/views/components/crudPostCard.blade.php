@props(['post'])

<div>
    {{-- Editar post --}}
    <a href="{{ route('posts.edit', $post) }}" class="crud-btn bg-gre">Editar</a>
    {{-- Borrar post --}}
    <form action=" {{ route('posts.destroy', $post) }}" method="post"> {{-- para borrar post uso la ruta 'posts.destroy', la ruta creada por Laravel a través del método resource(). --}}
        @csrf
        @method('DELETE') {{-- El método de la ruta posts.destroy es 'delete' pero como en un formulario html solo podemos tener de parámetros 'post' o 'get', uso la directiva @method de Laravel. --}}
        <button class="crud-btn bg-red">Borrar</button>
    </form>
</div>
