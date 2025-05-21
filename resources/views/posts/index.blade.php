<x-layout>
    <main x-data="{ showCreatePost: false }" class="relative">
		<h1>{{ __('Últimos Posts') }}</h1>
		
		<div class="posts-grid">
			@foreach ($posts as $post) {{-- directiva @foreach de Laravel que funciona igual que un bucle for each --}}
				<x-postCard :post="$post"/> {{-- no uso los típicos brackets {{}} para enviar la información del post porque no es dato primitivo sino un objeto, entonces envío todo el objeto, y usando la nomenclatura ':' para la propiedad post --}}
			@endforeach
		</div>
		<x-postLinks :posts="$posts" />

		{{-- Botón de crear post --}}
		<button @click="showCreatePost = !showCreatePost" class="create-post"> + {{ __('Crear post') }}</button>

        {{-- Ventana flotante de crear post --}}
        <div x-show="showCreatePost" x-transition:enter.duration.200ms x-transition:leave.duration.150ms class="create-post-window">
            <div @click.away="showCreatePost = false">
                <x-createPost />
            </div>
        </div>
	</main>
</x-layout>