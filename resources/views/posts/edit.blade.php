@extends('layout')
@section('content')
<h1 class="title">Edit post</h1>
<form class="input-form" method="POST" action="/admin/posts/{{$post->id}}">
    @csrf
    @method('PATCH')
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Title" value="{{old('title',$post->title)}}">
    @error('title')
    <p class="error">{{$message}}</p>
    @enderror

    <label for="body">Body</label>
    <textarea name="body" id="body" placeholder="Body">{{old('body',$post->body)}}</textarea>
    @error('body')
    <p class="error">{{$message}}</p>
    @enderror

    <label for="date">Published</label>
    <input type="date" name="published" id="published" value="{{old('date',date_create($post->published)->format('Y-m-d'))}}">
    @error('published')
    <p class="error">{{$message}}</p>
    @enderror

    <label for="category">Category</label>
    <select type="text" name="category" id="category" >
        <option value="" >Non</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach    
    </select>
    @error('category')
    <p class="error">{{$message}}</p>
    @enderror

    <button type="submit">Update</button>
</form>
@endsection