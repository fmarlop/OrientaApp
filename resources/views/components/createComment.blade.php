
<div class="dash card">
    <h3>{{ __('Crear un nuevo comentario') }}</h3>

    {{-- Mensaje de sesión --}}
    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" /> {{-- he creado un componente 'flashMsg' que invocamos aquí para mostrar un mensaje con un color de fondo, en este caso que el comentario se ha publicado correctamente. --}}
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete') }}" bg="bg-red" />
    @endif
    
    {{-- Crear comentario --}}
    <form action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- Cuerpo del comentario --}}
        <x-bodyField vl="{{ old('body') }}" />

        <input type="hidden" name="post_id" value="{{ $post->id }}"> {{-- campo oculto para pasar el post_id--}}

        {{-- Botón para crear comentario --}}
        <button class="btn" x-ref="btn">{{ __('Crear') }}</button>

    </form>
</div>
