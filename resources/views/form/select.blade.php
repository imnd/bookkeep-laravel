<div class="row">
    <label for="{{ $name }}">{{ $label }}:</label>
    <select name="{{ $name }}">
        <option value="">...</option>
        @foreach($items as $item)
            <option @if (isset($data) && $item->id==$data->$name) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>