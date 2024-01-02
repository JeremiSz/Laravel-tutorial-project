@extends('layout')
@section('content')
    <h1>Blog</h1>
    @foreach($posts as $post)
        <article>
            <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
            <h3><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></h3>
            {{$post->sample}}
        </article>
    @endforeach
@endsection