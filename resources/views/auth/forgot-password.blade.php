<x-layout>
	<h1>Recibir email de restablecimiento de contraseña</h1>
	
	{{-- Mensaje de sesión --}}
	@if (session('status'))
		<x-flashMsg msg="{{ session('status') }}" /> {{-- se pasará el mensaje 'status' de la función passwordEmail de ResetPasswordController al componente 'flashMsg'. --}}
	@endif
	
	<div class="card">
		<form action="{{ route('password.request') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
			@csrf {{-- directiva obligatoria para los formularios con método post, genera un token que se encarga de seguridad --}}

			{{-- Email --}}
			<x-emailField />

			{{-- Botón Logear --}}
			<button class="btn" x-ref="btn">Recibir</button>
		
		</form>
	</div>
</x-layout>
