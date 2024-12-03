@props(['comment']) {{-- creo componente para tarjetas de cada posts, ya que van a ser usadas en diferentes vistas, creando la propiedad post donde pasaré la info de cada post que construya esta tarjeta y la propiedad full donde indicaré si el post se debe mostrar completo o no. --}}

<div class="comment card">
    <div>
        {{-- Autor y fecha del post --}}
        <div>
            <span>{{ __('publicado ') }}{{ $comment->created_at->diffForHumans() }}{{ __(' por') }}</span> {{-- obtengo la fecha de cada post de la base de datos y la convierto a un formato más legible para humanos con la función diffForHumans() (en inglés por defecto desafortunadamente) --}}
            <a href="{{ route('userposts', $comment->user ) }}" {{-- al linkear la ruta userposts, le paso también un segundo parametro que va a ser la instancia del usuario, gracias a que he creado la relación uno muchos entre post y user. --}}>{{ $comment->user->username }}</a> {{-- parecido a lo de antes, obtengo el nombre de usuario a través de la relación uno muchos entre post y user, obtengo el usuario al que pertenece el post y de eso luego obtengo el nombre de usuario. --}}
        </div>

        {{-- Cuerpo del post --}}
        <div>
            <span>{{ $comment->body }} </span> {{-- obtengo el mensaje de cada post de la base de datos. --}}
        </div>

        {{-- Editar y borrar post (solo en dashboard) --}}
        {{ $slot }}
    </div>
</div>
