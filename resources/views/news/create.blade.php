@extends('back.layout')

@section('content')

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">Создание новости</h2>
                <form action="{{url("manager/news/create")}}" method="POST">
                    <label for="title">Категория</label>&nbsp;
                    <select name="category_id">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                    <br /><br />

                    <label for="title">Заголовок</label>&nbsp;
                    <input name="title" />
                    <br /><br />

                    <textarea name="text" id="text"></textarea>
                    <label for="title">Порядок сортировки</label>&nbsp;
                    <input name="sort" value="" />
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