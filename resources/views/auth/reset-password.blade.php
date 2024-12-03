<x-layout>
	<main>
		<h1>{{ __('Resetea tu contraseña') }}</h1>
		<div class="card">
			<form action="{{ route('password.update') }}" method="post">
				@csrf {{-- directiva obligatoria para los formularios con método post, genera un token que se encarga de seguridad --}}
	
				<input type="hidden" name="token" value="{{$token}}"> {{-- para validar la vista con el token (está todo en la documentación de Laravel) --}}
	
				{{-- Email --}}
				<x-emailField />
	
				{{-- Contraseña --}}
				<x-passwordField />
	
				{{-- Confirmar Contraseña --}}
				<x-passconfField />
	
				{{-- Botón Resetear --}}
				<button class="btn" x-ref="btn">{{ __('Resetear contraseña') }}</button>
			</form>
		</div>
	</main>
</x-layout>
