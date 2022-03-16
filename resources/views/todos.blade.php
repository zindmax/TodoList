@extends('layouts')
@section('head')
    @include('_head')
@endsection
@section('content')
    <div class="w-25 m-auto">
        <a href="{{route('show_categories')}}">Go back</a>
        <p class="mb-1">Add new todo</p>
        <div class="mb-2">
            <form action="{{route('add_todo', ['id' => $catId])}}" method="post">
                @csrf
                <div class="d-flex flex-row justify-content-between">
                    <input type="text" name="todo_name" placeholder="Enter todo name">
                    <button type="submit" class="btn-sm btn-success">Add</button>
                </div>
            </form>
        </div>
        <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{route('show_items', ['id' => $todo->id])}}"><?=$todo->name?></a>
                        <form action="{{route('delete_todo', ['id' => $todo->id])}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-sm btn-danger">Х</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
