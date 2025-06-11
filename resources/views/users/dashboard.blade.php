<x-layout>
	<main x-data="{ showCreatePost: false }" class="dash">
		<h1>{{ __('Hola ') }}{{ auth()->user()->username }}{{ __(', tienes ') }}{{ $posts->total() }}{{ __(' posts') }}</h1>

		{{-- Cambiar imagen de usuario --}}
		<h3>{{ __('Cambiar imagen de usuario') }}</h3>

		<form action="{{ route('avatar') }}" method="post" enctype="multipart/form-data" x-data="formSubmit" @submit.prevent="submit"> {{-- importante enctype para poder subir la imagen --}}
			{{-- Nombre de Usuario --}}
			@csrf {{-- directiva obligatoria para los formularios con método post, genera un token que se encarga de seguridad --}}
			<x-avatarField />
			{{-- Botón Subir --}}
			<button class="btn" x-ref="btn">{{ __('Subir') }}</button>
		</form>

		{{-- Posts del usuario --}}
		<h3>{{ __('Tus últimos posts') }}</h3>

		<div class="posts-grid">
			@foreach ($posts as $post) {{-- directiva @foreach de Laravel que funciona igual que un bucle for each --}}
				<x-postCard :post="$post"> {{-- no uso los típicos brackets {{}} para enviar la información del post porque no es dato primitivo sino un objeto, entonces envío todo el objeto, y usando la nomenclatura ':' para la propiedad post --}}
					<x-crudPostCard :post="$post" />
				</x-postCard>
			@endforeach
		</div>
		<x-postLinks :posts="$posts" />

		<h3>{{ __('Manual de Usuario') }}</h3>

		@php
			// dd(app()->getLocale());
			if (app()->getLocale() == 'es') {
				$manual = asset('storage/manuals/Manual de Usuario - Orienta App.pdf');
			}
			else {
				$manual = asset('storage/manuals/User Manual - Orienta App.pdf');
			}
		@endphp

		<a href="{{$manual}}" download> {{ __('Descargar el Manual de usuario de Orienta') }} </a>

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
