@props(['post', 'full' => false ]) {{-- creo componente para tarjetas de cada posts, ya que van a ser usadas en diferentes vistas, creando la propiedad post donde pasaré la info de cada post que construya esta tarjeta y la propiedad full donde indicaré si el post se debe mostrar completo o no. --}}

<div class="@if ($full) postcomment @else post @endif card">
    {{-- Foto portada --}}
    <div>
        @if ($post->image) {{-- '($post->image)' en caso de que quisiera usar una imagen por defecto--}}
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="@if ($full) fullimg @else smallimg @endif"> {{-- función asset() busca dentro de /public y concadeno (.) el nombre de la imagen. Y además if else que proporcionará una clase u otra para mostrar la imagen más grande o más pequeña dependiendo de la propiedad full. --}}
        @else
            <img src="{{ asset('storage/web_images/OrientaDefault.png') }}" alt="" class="@if ($full) fullimg @else smallimg @endif"> {{-- añadir al directorio una imagen por defecto si quiero usar una default.jpg--}}
        @endif
    </div>
    <div>
        {{-- Título del post --}}
        <h2>{{ $post->title }}</h2>

        {{-- Autor y fecha del post --}}
        <div>
            <span>{{ __('publicado ') }}{{ $post->created_at->diffForHumans() }}{{ __(' por') }}</span> {{-- obtengo la fecha de cada post de la base de datos y la convierto a un formato más legible para humanos con la función diffForHumans() (en inglés por defecto desafortunadamente) --}}
            <a href="{{ route('userposts', $post->user ) }}" {{-- al linkear la ruta userposts, le paso también un segundo parametro que va a ser la instancia del usuario, gracias a que he creado la relación uno muchos entre post y user. --}}>{{ $post->user->username }}</a> {{-- parecido a lo de antes, obtengo el nombre de usuario a través de la relación uno muchos entre post y user, obtengo el usuario al que pertenece el post y de eso luego obtengo el nombre de usuario. --}}
        </div>

        {{-- Cuerpo del post --}}
        <div>
            @if ($full) {{-- if else que mostrará el post completo o no dependiendo del valor de esta propiedad. --}}
                <span>{{ $post->body }} </span> {{-- obtengo el mensaje de cada post de la base de datos. --}}
            @else
                <span>{{ Str::words($post->body, 10) }} </span> {{-- obtengo el mensaje de cada post de la base de datos y uso esta función words para mostrar solo 10 palabras. --}}
                <a href="{{ route('posts.show', $post) }}">&nbsp; {{ __('Leer más') }} &rarr;</a> {{-- añado un link para poder leer el post completo. --}}
            @endif
        </div>

        {{-- Editar y borrar post (solo en dashboard) --}}
        {{ $slot }}
    </div>
</div>
