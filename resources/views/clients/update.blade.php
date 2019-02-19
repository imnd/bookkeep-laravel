@extends('form.form')

@section('content')

<form action='{{url("manager/news/update/$data->id")}}' method="POST">
    @include('../form.select', [
        'label' => 'подкатегория',
        'items' => $subcategories,
        'name' => 'subcategory_id',
    ])
    @include('../form.input', [
        'label' => 'название',
        'name' => 'name'
    ])
    @include('../form.input', [
        'label' => 'адрес',
        'name' => 'address'
    ])

    {{ csrf_field() }}

    <input type="submit" class="button" value="Сохранить">
    <div class="clear"></div>
</form>

@endsection