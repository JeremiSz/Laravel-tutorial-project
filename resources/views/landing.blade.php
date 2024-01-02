@extends('layout')
@section('content')
@guest
<header class="user-controls">
    <a href="/register">Register</a>
    <a href="/login">Login</a>
</header>
@else
<header class="user-controls">
    @if (auth()->user()->can('admin'))
    <a href="/admin/posts/create">New Post</a>
    <a href="/admin/posts">All Posts</a>
    @endif
    <form method="post" action="logout">
        @csrf
        <button type="submit" class="links">Logout</button>
    </form>
</header>
@endguest
   
    <h1>Blog</h1>
    <x-category-dropdown/>
    <x-search-filter/>
    <section class="lg:grid lg:grid-cols-6 max-w-6xl mx-auto mt-6 lg:mt-20">
        @foreach($posts as $post)
            @if($loop->index == 0)
            <div class="col-span-6">
                <x-post-card :post="$post" />
            </div>
            @elseif ($loop->index < 3)
            <div class="col-span-3">
                <x-post-card :post="$post" />
            </div>
            @else
            <div class="col-span-2">
                <x-post-card :post="$post" />
            </div>
            @endif
        @endforeach
        {{ $posts->links()}}
    </section>
@endsection