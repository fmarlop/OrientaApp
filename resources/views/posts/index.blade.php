<x-layout>
	<main>
		<h1>{{ __('Últimos Posts') }}</h1>
		
		<div class="posts-grid">
			@foreach ($posts as $post) {{-- directiva @foreach de Laravel que funciona igual que un bucle for each --}}
				<x-postCard :post="$post"/> {{-- no uso los típicos brackets {{}} para enviar la información del post porque no es dato primitivo sino un objeto, entonces envío todo el objeto, y usando la nomenclatura ':' para la propiedad post --}}
			@endforeach
		</div>
		<x-postLinks :posts="$posts" />
		<x-createPost />
	</main>
</x-layout>