<?php
use App\Models\Articles;
use App\Models\ArticleSubcats;
?>

<p>Поля с <span class="error">*</span> обязательны к заполнению.</p>

@if (session('message'))
    <div class="success row">
        {{ session('message') }}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="error row">
            {{ $error }}
        </div>
    @endforeach
    
@endif

<div class="form">
    <form method="POST">
        @include('form.select', [
            'label' => 'подкатегория',
            'items' => ArticleSubcats::all(),
            'name' => 'subcat_id',
            'data' => $data ?? null,
        ])
        @include('form.input', [
            'label' => 'название',
            'name' => 'name',
            'data' => $data ?? null,
        ])
        <div class="row">
            <label for="unit">ед.изм.:</label>
            <select name="unit">
                <option value="">...</option>
                @foreach(Articles::getUnits() as $unit)
                    <option @if (isset($data) && $unit==$data->unit) selected @endif value="{{ $unit }}">{{ $unit }}</option>
                @endforeach
            </select>
        </div>
        @include('form.input', [
            'label' => 'цена',
            'name' => 'price',
            'data' => $data ?? null,
        ])
        @if (!isset($data))
            <div class="row">
                <label for="active">активный:</label>
                <select name="active">
                    <option value="">...</option>
                    @foreach(['нет', 'да'] as $key => $item)
                        <option @if (isset($data) && $data->active==$key) selected @endif  value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        {{ csrf_field() }}

        <input type="submit" class="button" value="Сохранить">
        <div class="clear"></div>
    </form>
</div>