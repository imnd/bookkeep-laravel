@extends('layout')

@section('content')

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <h5><i>{{ $data->category->title }}</i></h5>
                <h2 class="blog-post-title">{!! $data->title !!}</h2>
                <p class="blog-post-meta">{!! $data->created_at !!}</p>
                {!! $data->text !!}
            </div>
        </div>
    </div>
</main>


@endsection