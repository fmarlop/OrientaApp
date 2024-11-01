
<div>
    <label for="password">Contraseña</label>
    <input type="password" name="password" class="@error('password') field-error @enderror">
    @error('password')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
