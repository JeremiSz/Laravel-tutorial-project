
<div class="cat-banner max-w-4xl mx-auto mt-4 lg:mt-20">
    <a class="cat-element" href="/">All</a>
    <span class="cat-separator">|</span>
    @foreach ($categories as $category)
        @if (request('search')?? false)
        <a class="cat-element" href="/?category={{$category->slug}}&search={{request('search')}}">{{$category->name}}</a>
        @else
        <a class="cat-element" href="/?category={{$category->slug}}">{{$category->name}}</a>
        @endif
        @if(!$loop->last)
            <span class="cat-separator">|</span>
            @endif
    @endforeach
    
</div>