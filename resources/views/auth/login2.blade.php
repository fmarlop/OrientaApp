<x-layout>
	<main>
		<h1>{{ __('Iniciar sesión') }}</h1>
	
		{{-- Mensaje de sesión --}}
		@if (session('status'))
			<x-flashMsg msg="{{ session('status') }}" /> {{-- se pasará el mensaje 'status' de la función passwordEmail de ResetPasswordController al componente 'flashMsg'. --}}
		@endif
	
		<div class="card">
			<form action="{{ route('login2') }}" method="post">
				@csrf {{-- directiva obligatoria para los formularios con método post, genera un token que se encarga de seguridad --}}
				
				{{-- Nombre de usuario --}}
				<x-usernameField />
	
				{{-- Contraseña --}}
				<x-passwordField />
	
				{{-- Casilla Recuérdame --}}
				<div class="form-line">
					<div>
						<input type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
						<label for="remember">{{ __('Recuérdame') }}</label>
					</div>
					<a href="{{ route('password.request')}}">{{ __('¿Olvidaste tu contraseña?') }}</a>
				</div>
				
				@error('failed')
						<p class="error">{{ $message }}</p>
				@enderror
	
				{{-- Botón Logear --}}
				<button class="btn" x-ref="btn">{{ __('Iniciar') }}</button>
			
			</form>
		</div>
	</main>
</x-layout>
