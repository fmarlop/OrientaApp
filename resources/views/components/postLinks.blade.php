@props(['posts', 'comments'])

@if (isset($posts) && $posts)
    <div class="post-links">
        {{ $posts->links() }} {{-- links para navegación con paginación (en inglés por defecto desafortunadamente) --}}
    </div>
@else
    <div class="post-links">
        {{ $comments->links() }} {{-- links para navegación con paginación (en inglés por defecto desafortunadamente) --}}
</div>  
@endif
