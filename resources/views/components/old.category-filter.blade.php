
<div class="cat-banner max-w-4xl mx-auto mt-4 lg:mt-20">
    @foreach ($categories as $category)
        <a class="cat-element" href="/?category={{$category->slug}}">{{$category->name}}</a>
        @if(!$loop->last)
            <span class="cat-separator">|</span>
            @endif
    @endforeach
    
</div>