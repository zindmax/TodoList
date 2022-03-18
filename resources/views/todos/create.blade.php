@extends('layouts')
@section('head')
    @include('_head')
@endsection

@section('content')
    <div class="m-auto w-25">
        <div class="d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-center mb-4">
                <h1>Create Todo</h1>
            </div>
            <div class="mb-2">
                <form id="todo_add_form" action="{{route('todos.store')}}" method="post">
                    @csrf
                    <input class="form-control" type="text" name="todo_name" placeholder="Enter todo name">
                </form>
            </div>
            <div class="d-flex flex-column mb-2">
                <label class="form-label" for="category">Choose category: </label>
                <select class="form-select" id="category" form="todo_add_form" name="category">
                    <option value="">Without</option>
                    @foreach($categories as $category)
                        <option value="<?=$category->id?>"><?=$category->name?></option>
                    @endforeach
                </select>
            </div>
            <button type="submit" form="todo_add_form" class="btn-sm btn-success">Create</button>
        <div class="d-flex flex-row justify-content-between">
    </div>
@endsection
