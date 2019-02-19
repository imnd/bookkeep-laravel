@extends('back.layout')

@section('content')

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">Редактирование новости</h2>
                <form action='{{url("manager/news/update/$data->id")}}' method="POST">
                    <label for="title">Категория</label>&nbsp;
                    <select name="category_id">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @if ($cat->id==$data->category_id) selected @endif>{{ $cat->title }}</option>
                        @endforeach
                    </select>
                    <br /><br />

                    <label for="title">Заголовок</label>&nbsp;
                    <input name="title" value="{!! $data->title !!}" />
                    <br /><br />

                    <textarea name="text" id="text">{!! $data->text !!}</textarea>
                    <label for="title">Порядок сортировки</label>&nbsp;
                    <input value="{!! $data->sort !!}" name="sort" />
                    <br />

                    {{ csrf_field() }}
                    <button type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('#text').summernote();
    });
</script>

@endsection