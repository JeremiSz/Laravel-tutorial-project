@extends('layout')
@section('content')
<header class="user-controls">
    <a href="/">Home</a>
    <a href="/admin/posts/create">New Post</a>
</header>
<table class="all-posts">
    <tr>
        <th>Title</th>
        <th>Published</th>
        <th>Category</th>
        <th>Sample</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>
            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
        </td>
        <td>{{$post->published}}</td>
        <td>{{$post->category->name}}</td>
        <td>{!!$post->sample!!}</td>
        <td>
            <a href="/admin/posts/{{$post->id}}/edit">Edit</a>
        </td>
        <td>
            <form action="/admin/posts/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type=submit>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection