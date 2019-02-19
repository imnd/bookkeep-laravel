@extends('layout')

@section('content')

@include('articles.form', compact('data', 'message'))

@endsection