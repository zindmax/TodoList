@extends('layouts')
@section('head')
    @include('_head')
@endsection
@section('content')
    <div class="w-25 m-auto">
        <div class="d-flex justify-content-center">
            <h1><?=$category->name?></h1>
        </div>
        <a href="{{route('categories.index')}}">Go back</a>
        <p class="mb-1">Add new todo</p>
        <div class="mb-2">
            <form action="{{route('todos.store', ['category' => $category->id])}}" method="post">
                @csrf
                <div class="d-flex flex-row justify-content-between">
                    <input  class="form-control" type="text" name="todo_name" placeholder="Enter todo name">
                    <div class="ms-1">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{route('todos.show', ['todo' => $todo])}}"><?=$todo->name?></a>
                        <form action="{{route('todos.destroy', ['todo' => $todo->id])}}"
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
