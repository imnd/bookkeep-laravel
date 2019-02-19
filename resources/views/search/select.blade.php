<div class="control">
    <label for="{{ $name }}">{{ $label }}:</label>
    <select name="{{ $name }}">
        <option value="">...</option>
        @foreach($items as $item)
            <option @if (isset($_GET[$name]) && $_GET[$name]==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>