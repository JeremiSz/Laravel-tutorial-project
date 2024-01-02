@extends('layout')
@section('content')
<div class="post-full max-w-6xl mx-auto mt-6 lg:mt-20">
<h1>Blog</h1>
<article>
    <h2>{{$post->title}}</h2>
    {!!$post->body!!}
    <a class="back" href="/">Go Back</a>
</article>
</div>
@endsection