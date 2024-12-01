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
		<h1>Siempre hay un camino</h1>
		<h1>Siempre hay un camino<br>para tu destino ideal</h1>
		<h2>Autoconocimiento</h2>
		<h2>Plan de Acción</h2>
	</section>

	<main>
        {{-- Menú principal --}}
		<h1>Autoconocimiento</h1>
		<div class="menu-grid">
			<a href="{{ route('compprefmain') }}">
				<div class="menu">
					<img src="{{ asset('storage/web_images/CompPref.jpg') }}" alt=""> {{-- {{ asset('storage/web_images/OrientaDefault.png') }} --}}
					<h2>Competencias y Preferencias</h2>
				</div>
			</a>
		</div>
		<h1>Plan de Acción</h1>
		<div class="menu-grid">
			<a href="{{ route('compatibility') }}">
				<div class="menu">
					<img src="https://picsum.photos/300" alt="">
					<h2>Compatibilidad de Familias Profesionales</h2>
				</div>
			</a>
		</div>
		<h1>Extra</h1>
		<div class="menu-grid">
			<a href="{{ route('comppref') }}">
				<div class="menu">
					<img src="{{ asset('storage/web_images/OrientaDefault.png') }}" alt="">
					<h2>Extra 1</h2>
				</div>
			</a>
			<a href="{{ route('comppref') }}">
				<div class="menu">
					<img src="{{ asset('storage/web_images/OrientaDefault.png') }}" alt="">
					<h2>Extra 2</h2>
				</div>
			</a>
			<a href="{{ route('comppref') }}">
				<div class="menu">
					<img src="{{ asset('storage/web_images/OrientaDefault.png') }}" alt="">
					<h2>Extra 3</h2>
				</div>
			</a>
			<a href="{{ route('comppref') }}">
				<div class="menu">
					<img src="{{ asset('storage/web_images/OrientaDefault.png') }}" alt="">
					<h2>Extra 4</h2>
				</div>
			</a>
			<a href="{{ route('comppref') }}">
				<div class="menu">
					<img src="{{ asset('storage/web_images/OrientaDefault.png') }}" alt="">
					<h2>Extra 5</h2>
				</div>
			</a>
		</div>
    </main>


</x-layout>
