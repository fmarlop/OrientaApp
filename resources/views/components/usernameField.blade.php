
<div>
    <label for="username">Nombre de Usuario</label>
    <input type="text" name="username" value="{{ old('username') }}" {{-- función que obtiene el antiguo valor introducido porque quiero preservarlo --}} class="@error('username') field-error @enderror">
    @error('username') {{-- directiva que toma la llave del error que quiero mostrar --}}
        <p class="error">{{ $message }}</p> {{-- mensaje autogenerado según las reglas especificadas en AuthController (en inglés por defecto) --}}
    @enderror
</div>
