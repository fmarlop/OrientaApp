<x-layout>
	<main>
		<a href="{{ route('dashboard') }}" class="breadcrumb">&#8592; {{ __('Volver a tu panel') }}</a> {{-- Enlace miga de pan --}} 
	
		<div class="dash card">
			<h3>{{ __('Editar post') }}</h3>
	
			<form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
	
				{{-- Título del post --}}
				<x-titleField vl="{{ $post->title }}" />
	
				{{-- Cuerpo del post --}}
				<x-bodyField vl="{{ $post->body }}" />
	
				{{-- Imagen de portada si existe --}}
				@if ($post->image)
					<div>
						<label>{{ __('Imagen de portada') }}</label>
						<img src="{{ asset('storage/' . $post->image) }}" alt="" class="crud-img"> {{-- función asset() busca dentro de /public y concadeno (.) el nombre de la imagen--}}
					</div>
				@endif
	
				{{-- Imagen del post nueva --}}
				<x-imageField />
	
				{{-- Botón para crear post --}}
				<button class="btn" x-ref="btn">{{ __('Actualizar') }}</button>
	
			</form>
		</div>
	</main>
</x-layout>