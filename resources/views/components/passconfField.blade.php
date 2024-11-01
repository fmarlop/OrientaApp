
<div>
    <label for="password_confirmation">Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" {{-- uso '_confirmation' en el nombre del input por las reglas de validación de Laravel (véase \app\Http\Controllers\AuthController.php) --}} class="@error('password') field-error @enderror">
</div>
