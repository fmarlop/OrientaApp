<h1>Hola {{ $user->username }}</h1>

<div>
    <h3>Has creado {{ $post->title }}</h3>
    <p>{{ $post->body }}</p>
    @if($post->image) {{-- solo se enviará la imagen si existe  --}}
        <img width="300" src="{{ $message->embed('storage/' . $post->image) }}" alt=""> {{-- propiedad especial '$message' que se crea con el Mailable. Función 'embed()' toma la ruta al archivo que quiero embeber en el email. --}}
    @endif
</div>