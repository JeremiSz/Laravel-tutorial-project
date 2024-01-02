@extends('layout')
@section('content')
    <h1>Blog</h1>
    <article>
        <h2>{{$post->title}}</h2>
        {!!$post->body!!}
        <a href="/">Go Back</a>
    </article>
@endsection