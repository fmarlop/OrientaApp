<x-layout>
    <main>
		<h1>{{ __('Posts de ') }}{{ $user->username }}</h1> {{-- puedo obtener el nombre de usuario gracias a la variable user que cree en el controlador --}} |  {{ $posts->total()}} {{-- obtengo el número de posts totales de este usuario. Con count () solo obtendría el número de posts por página. --}}
		{{-- Posts del usuario--}}
		<div class="posts-grid">
			@foreach ($posts as $post) {{-- directiva @foreach de Laravel que funciona igual que un bucle for each --}}
				<x-postCard 
				:post="$post"/> {{-- no uso los típicos brackets {{}} para enviar la información del post porque no es dato primitivo sino un objeto, entonces envío todo el objeto, y usando la nomenclatura ':' para la propiedad post --}}
			@endforeach
		</div>
		<x-postLinks :posts="$posts" />
	</main>
</x-layout>
