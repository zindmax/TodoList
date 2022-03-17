@extends("layouts")
@section("head")
    @include("_head")
@endsection
@section("content")
    @if (Route::has('login'))
        @auth
            <div>
                <a href="{{route('categories.index')}}">Categories</a>
                <a href="{{route('todos.index')}}">Show all</a>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <h1>Here can be your TODO's!</h1>
            </div>
        @endauth
    @endif
@endsection
