<x-layout>
	<h1>Iniciar sesión</h1>

	{{-- Mensaje de sesión --}}
	@if (session('status'))
		<x-flashMsg msg="{{ session('status') }}" /> {{-- se pasará el mensaje 'status' de la función passwordEmail de ResetPasswordController al componente 'flashMsg'. --}}
	@endif

	<div class="card">
		<form action="{{ route('login') }}" method="post">
			@csrf {{-- directiva obligatoria para los formularios con método post, genera un token que se encarga de seguridad --}}

			{{-- Email --}}
			<x-emailField />

			{{-- Contraseña --}}
			<x-passwordField />

            {{-- Casilla Recuérdame --}}
            <div class="form-line">
				<div>
					<input type="checkbox" name="remember" id="remember">
					<label for="remember">Recuérdame</label>
				</div>
				<a href="{{ route('password.request')}}">¿Olvidaste tu contraseña?</a>
            </div>
            
            @error('failed')
					<p class="error">{{ $message }}</p>
			@enderror

			{{-- Botón Logear --}}
			<button class="btn" x-ref="btn">Iniciar</button>
		
		</form>
	</div>
</x-layout>
