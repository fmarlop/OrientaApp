<x-layout>

	{{-- para mostrar una imagen --}}
	{{-- <img src="{{ asset('storage/posts_images/EXaxsZ6LPuIzaYRkr4J9pGkw8g2l5ge0asYU1rK3.png') }}"  alt=""> --}}  {{-- función asset() busca dentro de /public --}}
	<section>
		<div class="images">
			<img src="{{ asset('storage/web_images/Camino.jpg') }}" alt="">
			<img src="{{ asset('storage/web_images/Mapa.png') }}" alt="">
			<img src="{{ asset('storage/web_images/Escalador.png') }}" alt="">
			<img src="{{ asset('storage/web_images/Suma.png') }}" alt="">
		</div>
		<h1>{{ __('Siempre hay un camino') }}</h1>
		<h1>{{ __('Siempre hay un camino') }}<br>{{ __('para tu destino ideal') }}</h1>
		<h2>{{ __('Autoconocimiento') }}</h2>
		<h2>{{ __('Plan de Acción') }}</h2>
	</section>

	<main> {{-- Menú principal --}}
		<x-self-knowledge />
		<x-action-plan />
		<x-extras />
    </main>
</x-layout>
