<article class="post">
    <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
    @if ($post->category != null)
    <h3><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></h3>
    @endif
    <p>Posted <time>{{$post->created_at->diffForHumans()}}</time></p>
    {!!$post->sample!!}
</article>