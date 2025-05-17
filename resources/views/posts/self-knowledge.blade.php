<x-layout>

	{{-- para mostrar una imagen --}}
	{{-- <img src="{{ asset('storage/posts_images/EXaxsZ6LPuIzaYRkr4J9pGkw8g2l5ge0asYU1rK3.png') }}"  alt=""> --}}  {{-- función asset() busca dentro de /public --}}
	
	<main>
		<div class="category">
			<p>
				{{ __('Esta sección está diseñada para ayudarte a entenderte mejor a ti mismo: tus intereses, habilidades, valores y preferencias personales.') }}
				<br><br>
				{{ __('El conocimiento propio es la base para tomar decisiones acertadas que realmente te entusiasmen y te hagan sentir realizado. Una persona está en constante cambio, por tanto el proceso de autoconocimiento dura toda la vida.') }}
				<br><br>
				{{ __('Este es el primer paso de cualquier emprendimiento.') }}
			</p>
			<x-self-knowledge />
			<p>
				<span>“</span><em>{{ __('Conocerse a uno mismo es el comienzo de toda sabiduría.') }}</em><span>” —</span>{{ __('Aristóteles.') }}
				<br><br>
				<span>“</span><em>{{ __('Conócete a ti mismo y serás invencible.') }}</em><span>” —</span>{{ __('Sun Tzu.') }}
			</p>
		</div>
    </main>

</x-layout>
