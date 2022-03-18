@extends('layouts')
@section('head')
    @include('_head')
@endsection
@section('content')
    <div class="w-25 m-auto">
        <p>All your todos</p>
        <ul class="list-group">
            @if(isset($todos))
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        <div class="d-flex flex-row justify-content-between">
                            <a href="{{route('todos.show', ['todo' => $todo->id])}}">{{$todo->name}}</a>
                            <form action="{{route('todos.destroy', ['todo' => $todo->id])}}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-sm btn-danger">Х</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection
