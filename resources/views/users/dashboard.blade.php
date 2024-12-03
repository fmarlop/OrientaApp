<x-layout>
	<main>
		<h1>{{ __('Hola ') }}{{ auth()->user()->username }}{{ __(', tienes ') }}{{ $posts->total() }}{{ __(' posts') }}</h1>
	
		{{-- Crear post --}}
		<x-createPost />
	
		{{-- Posts del usuario --}}
		<h3>{{ __('Tus últimos posts') }}</h3>
	
		<div class="posts-grid">
			@foreach ($posts as $post) {{-- directiva @foreach de Laravel que funciona igual que un bucle for each --}}
				<x-postCard :post="$post">{{-- no uso los típicos brackets {{}} para enviar la información del post porque no es dato primitivo sino un objeto, entonces envío todo el objeto, y usando la nomenclatura ':' para la propiedad post --}}
					<x-crudPostCard :post="$post" />
				</x-postCard>
			@endforeach
		</div>
		<x-postLinks :posts="$posts" />
	</main>
</x-layout>
