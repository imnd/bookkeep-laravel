@extends('back.layout')

@section('content')

<div class="jumbotron text-center">
    <h1>Новости</h1>
</div>
<div class="container entry-content">
    @foreach($data as $item)
	<li>
        {{ $item->title }}&nbsp;
        <a href='{{ url("manager/news/update/$item->id") }}'><button type="button" class="btn btn-primary btn-sm">редактировать</button></a>
        <a href='{{ url("manager/news/delete/$item->id") }}'><button type="button" class="btn btn-sm btn-danger">удалить</button></a>
	</li>
    <br />
    @endforeach
    <br /><br />
    <a href="{{ url('manager/news/create') }}"><button type="button" class="btn btn-lg btn-success">создать</button></a>
</div>

@endsection