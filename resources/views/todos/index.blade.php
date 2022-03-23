@extends('layouts')
@section('head')
    @include('_head')
@endsection
@section('content')
    <div class="w-25 m-auto">
        <div class="d-flex justify-content-center mb-4">
            <h1>All your todos</h1>
        </div>
        <ul class="list-group">
            @if(isset($todos))
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        <div class="d-flex flex-row justify-content-between">
                            <a href="{{route('todos.show', ['todo' => $todo->id])}}">{{$todo->name}}</a>
                            <div class="d-flex flex-row">
                                <div class="me-2">
                                    <form action="{{route('todos.update', ['todo' => $todo])}}"
                                          method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn-sm btn-primary">Edit</button>
                                    </form>
                                </div>
                                <form action="{{route('todos.destroy', ['todo' => $todo->id])}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-sm btn-danger show_confirm"
                                            data-toggle="tooltip" title='Delete'>Х</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <script type="text/javascript" src="{{asset('js/delete_confirm.js')}}"></script>
@endsection
