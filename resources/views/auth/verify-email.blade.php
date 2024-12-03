<x-layout> {{-- esto es solo para cuando creas un nuevo usuario y aun no ha verificado su email --}}
    <main>
        <div class="card">
            @if (session('message'))
                <x-flashMsg msg="{{ session('message') }}" />
            @endif
    
            <h2>{{ __('Por favor verifique su email a través del correo que le hemos enviado.') }}</h1>
    
            <p>{{ __('¿No recibiste el email?') }}</p>
    
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button class="btn" x-ref="btn">{{ __('Enviar de nuevo') }}</button>
            </form>
        </div>
	</main>
</x-layout>