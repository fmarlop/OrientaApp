<div>
    <label for="avatar">{{ __('Subir imagen') }}</label>
    <input type="file" name="avatar" id="avatar">
    @error('avatar')
        <p class="error">{{ $message }}</p>
    @enderror
</div>