@props(['msg', 'bg' => 'bg-gre']) {{-- con esta directiva '@props' puedo crear propiedades para los componentes que van a ser invocados, en este caso la propiedad msg que será el mensaje que se mostrará y el color de fondo que quiero que sea dinámico, será verde o rojo según el tipo de mensaje, por defecto verde. --}}

<p class="flash {{ $bg }}">{{ $msg }}</p>
