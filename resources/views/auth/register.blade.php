<x-layout>
	<h1>Registrar nueva cuenta</h1>
	<div class="card">
		<form action="{{ route('register') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
			@csrf {{-- directiva obligatoria para los formularios con método post, genera un token que se encarga de seguridad --}}

			{{-- Nombre de Usuario --}}
			<x-usernameField />

			{{-- Email --}}
			<x-emailField />

			{{-- Contraseña --}}
			<x-passwordField />

			{{-- Confirmar Contraseña --}}
			<x-passconfField />

			{{-- Casilla Suscripción --}}
			<div>
				<input type="checkbox" name="subscribed" id="subscribed" checked="checked">
				<label for="subscribed">Suscríbete a nuestro boletín</label>
			</div>

			{{-- Botón Registrar --}}
			<button class="btn" x-ref="btn">Registrar</button>
		</form>
	</div>
</x-layout>