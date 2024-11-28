<x-layout>
    <main>
        <h1>Compatibilidad de Familias Profesionales</h1>
        <ul>
            @php
                $rankindex = 0;
            @endphp
            @foreach($profamswithnumber as $profamwithnumber) {{-- bucle para mostrar cada elemento ordenado --}}
                @php
                    $rankindex++;
                @endphp
                <li
                x-data="{ visible: false }"
                x-init="
                    const observer = new IntersectionObserver(([entry]) => {
                        if (entry.isIntersecting) visible = true;
                    });
                    observer.observe($el);
                "
                x-intersect:enter="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'"
                class="rank">
                    <img src="https://picsum.photos/200" alt="" /> {{-- {{ asset('storage/web_images/' . $profamwithnumber['profam']->image) }} --}}
                    <h2>{{ $profamwithnumber['profam']->name }}</h2>
                    <p class="@if($rankindex == 1) rfir @elseif($rankindex < 4) rsec @elseif ($rankindex < 10) rthi @elseif ($rankindex == 27) rlas @elseif($rankindex > 24) rseclas @elseif($rankindex > 18) rthilas @endif"> {{-- para dar propiedad css a cada elemento segun orden --}} {{ $profamwithnumber['number'] }}</p>
                </li>
            @endforeach
        </ul>
	</main>
</x-layout>
