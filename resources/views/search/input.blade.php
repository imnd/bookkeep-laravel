<div class="control">
    <label for="{{ $name }}">{{ $label }}:</label>
    <input name="{{ $name }}" value="{{ $_GET[$name] ?? '' }}">
</div>