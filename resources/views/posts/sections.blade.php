<x-layout>

	{{-- para mostrar una imagen --}}
	{{-- <img src="{{ asset('storage/posts_images/EXaxsZ6LPuIzaYRkr4J9pGkw8g2l5ge0asYU1rK3.png') }}"  alt=""> --}}  {{-- función asset() busca dentro de /public --}}

	<main>
		<div class="category">
			<p>
				{{ __('Orienta tiene como objetivo ayudarte a construir un proyecto de vida personalizado, en base al autoconocimiento y un plan de acción.') }}
				<br><br>
				{{ __('El autoconocimiento te ayudará a entender dónde te encuentras actualmente y a dónde quieres llegar; el plan de acción es lo que te llevará de un punto a otro.') }}
				<br><br>
				{{ __('Comienza a explorarte a ti mismo, y cuando lo hayas hecho, elabora tu plan.') }}
			</p>
			<x-self-knowledge />
			<x-action-plan />
			<x-extras />
			<p></p>
		</div>
    </main>
</x-layout>
