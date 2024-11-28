<x-layout>
    <main>
        <x-postCard :post="$post" {{-- uso : porque no es un tipo de dato primitivo. --}} full {{-- 'full' es lo mismo que 'full={{true}}' --}} />
	</main>
</x-layout>