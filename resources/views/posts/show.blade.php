<x-layout>
    <main>
        <div class="comments-grid">
            <x-postCard :post="$post" {{-- uso : porque no es un tipo de dato primitivo. --}} full {{-- 'full' es lo mismo que 'full={{true}}' --}} />
            @foreach ($comments as $comment) {{-- directiva @foreach de Laravel que funciona igual que un bucle for each --}}
            <x-commentCard :comment="$comment"/> {{-- no uso los típicos brackets {{}} para enviar la información del post porque no es dato primitivo sino un objeto, entonces envío todo el objeto, y usando la nomenclatura ':' para la propiedad post --}}
            @endforeach
        </div>
        <x-postLinks :comments="$comments" />
        <x-createComment :post="$post" />
	</main>
</x-layout>