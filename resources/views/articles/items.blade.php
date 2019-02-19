@extends('layout')

@section('content')

<form class="search-form" action='{{ url("items") }}' method="GET">
    @include('search.select', [
        'label' => 'подкатегория',
        'items' => $subcategories,
        'name' => 'subcategory_id',
    ])
    @include('search.input', [
        'label' => 'название',
        'name' => 'name'
    ])
    <div class="control">
        <label for="unit">ед.изм.:</label>
        <select name="unit">
            <option value="">...</option>
            @foreach($units as $unit)
                <option @if (isset($_GET['unit']) && $_GET['unit']==$unit) selected @endif value="{{ $unit }}">{{ $unit }}</option>
            @endforeach
        </select>
    </div>
    @include('search.input', [
        'label' => 'цена от',
        'name' => 'priceFrom'
    ])
    @include('search.input', [
        'label' => 'цена до',
        'name' => 'priceTo'
    ])
    <div class="control">
        <label for="active">активный:</label>
        <select name="active">
            <option value="">...</option>
            @foreach(['нет', 'да'] as $key => $item)
                <option @if (isset($_GET['active']) && $_GET['active']==$key) selected @endif  value="{{ $key }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" class="button" value="поиск">
    <div class="clear"></div>
</form>

<div class="container entry-content">
    <table>
        <tr>
            <th>подкатегория</th>
            <th>название</th>
            <th>ед.изм.</th>
            <th>цена</th>
            <th>активный</th>
            <th>операции</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->subcategory ? $item->subcategory->name : '' }}</td>
                <td><a href="{{ url('item') }}/{{ $item->id }}">{{ $item->name }}</a></td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->getActiveReadable() }}</td>
                <td><a class="button-update" title="update" href='{{ url("articles/update/{$item->id}") }}'></a></td>
            </tr>
        @endforeach
    </table>
    <br /><br />
</div>

@endsection