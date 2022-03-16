<div class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-sm">
            <a class="navbar-brand" href="#">Todo Lists</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route("dashboard")}}">Home</a>
                    </li>
                    <li class="nav-item">
{{--                        <a class="nav-link active" aria-current="page" href="{{route("show_todo")}}">Todo</a>--}}
                    </li>
                </ul>
                <div class="d-flex">
                    @if (Route::has('login'))
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="btn-sm btn-primary" role="button" aria-current="page" href="{{route('logout')}}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn-sm btn-primary me-md-2"
                               role="button" aria-current="page">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-sm btn-primary"
                                   role="button" aria-current="page">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
{{--                <form class="d-flex">--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                </form>--}}
            </div>
        </div>
    </nav>
</div>
