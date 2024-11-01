@props(['posts'])

<div class="post-links">
    {{ $posts->links() }} {{-- links para navegación con paginación (en inglés por defecto desafortunadamente) --}}
</div>
