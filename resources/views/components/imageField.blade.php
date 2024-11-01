
<div>
    <label for="image">Añadir imagen de portada </label>
    <input type="file" name="image" id="image">
    @error('image')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
