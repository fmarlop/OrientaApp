<x-layout>

	{{-- para mostrar una imagen --}}
	{{-- <img src="{{ asset('storage/posts_images/EXaxsZ6LPuIzaYRkr4J9pGkw8g2l5ge0asYU1rK3.png') }}"  alt=""> --}}  {{-- función asset() busca dentro de /public --}}

	<main>
		<div class="category">
			<p>
				{{ __('Esta sección contiene funciones adicionales, que no son esenciales para el uso de la aplicación, pero que complementan y enriquecen la experiencia.') }}
			</p>
			<x-extras />
			<p></p>
		</div>
    </main>

</x-layout>
