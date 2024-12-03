
<div>
    <label for="email">{{ __('Email') }}</label>
    <input type="text" {{-- uso tipo texto y no tipo email para obtener el mensaje autogenerado por Laravel --}} name="email" value="{{ old('email') }}" class="@error('email') field-error @enderror">
    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
