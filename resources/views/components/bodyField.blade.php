@props(['vl'])

<div>
    <label for="body">Cuerpo del post</label>
    <textarea name="body" rows="5" class="@error('body') field-error @enderror">{{ $vl }}</textarea>
    @error('body')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
