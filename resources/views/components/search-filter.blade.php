
<form method="GET" action="/" >
@if(request('category'))
    <input type="hidden" name="category" value="{{ request('category') }}">
@endif
    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="search-field max-w-6xl mx-auto mt-6 lg:mt-20">
</form>