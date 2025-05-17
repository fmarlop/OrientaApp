<x-layout>

	{{-- para mostrar una imagen --}}
	{{-- <img src="{{ asset('storage/posts_images/EXaxsZ6LPuIzaYRkr4J9pGkw8g2l5ge0asYU1rK3.png') }}"  alt=""> --}}  {{-- función asset() busca dentro de /public --}}

	<main>
		<div class="category">
			<p>
				{{ __('Esta sección es donde obtendrás las claves de los pasos que necesitas dar para alcanzar tus metas.') }}
				<br><br>
				{{ __('Los resultados e indicaciones que puedes encontrar aquí se corresponden con la información obtenida en la sección de autoconocimiento. Completa la sección de autoconocimiento para aumentar la precisión de los resultados del plan de acción.') }}
				<br><br>
				{{ __('Un plan de acción es el puente que te llevará desde donde estás ahora a donde quieres estar.') }}
			</p>
			<x-action-plan />
			<p>
				<span>“</span><em>{{ __('Un objetivo sin un plan es solo un deseo.') }}</em><span>” —</span>{{ __('Antoine de Saint-Exupéry.') }}
				<br><br>
				<span>“</span><em>{{ __('Si ya sabes lo que tienes que hacer y no lo haces, entonces estás peor que antes.') }}</em><span>” —</span>{{ __('Confucio.') }}
				<br><br>
				<span>“</span><em>{{ __('Lo que oigo, lo olvido; lo que veo, lo recuerdo; lo que hago, lo aprendo.') }}</em><span>” —</span>{{ __('Proverbio chino.') }}
			</p>
		</div>
    </main>

</x-layout>
