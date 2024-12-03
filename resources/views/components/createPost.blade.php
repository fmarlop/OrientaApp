
<div class="dash card">
    <h3>{{ __('Crear un nuevo post') }}</h3>

    {{-- Mensaje de sesión --}}
    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" /> {{-- he creado un componente 'flashMsg' que invocamos aquí para mostrar un mensaje con un color de fondo, en este caso que el post se ha publicado correctamente. --}}
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete') }}" bg="bg-red" />
    @endif
    
    {{-- Crear post --}}
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- Título del post --}}
        <x-titleField vl="{{ old('title') }}" />

        {{-- Cuerpo del post --}}
        <x-bodyField vl="{{ old('body') }}" />

        {{-- Imagen del post--}}
        <x-imageField />

        {{-- Botón para crear post --}}
        <button class="btn" x-ref="btn">{{ __('Crear') }}</button>

    </form>
</div>
