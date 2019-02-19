<div class="row">
    <label for="{{ $name }}">{{ $label }}:</label>
    <input name="{{ $name }}" value="{!! $data ? $data->$name : '' !!}">
</div>