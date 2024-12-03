@props(['vl'])

<div>
    <label for="title">{{ __('Título del post') }}</label>
    <input type="text" name="title" value="{{ $vl }}" class="@error('title') field-error @enderror">
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
