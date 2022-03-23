@extends("layouts")

@section("head")
@include("_head")
@endsection

@section("content")
<div class="w-50 m-auto d-flex flex-column">
    <div class="d-flex justify-content-center">
        <h1>{{$todo->name}}</h1>
    </div>
    <a href="<@if(isset($category)){{route('categories.show', ['category' => $category])}}
            @else{{route('todos.index')}}@endif">Go back</a>
    <div class="mb-1">
        @error('add_item')
        <div class="alert alert-danger">
            {{$messge}}
        </div>
        @enderror
        <form action="{{@route('items.store', ['id' => $todo->id])}}" method="POST">
            @csrf
            <div class="d-flex flex-row justify-content-between">
                <input class="form-control @error('todo_name') is-invalid @enderror"
                       type="text" name="add_item" placeholder="Enter your todo">
                <div class="ms-1">
                    <button type="submit" class="btn btn-success align-self-end">Add</button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <ul class="list-group">
            @if(isset($items))
                @foreach($items as $item)
                <li class="list-group-item" @if($item->completed)style="background-color: #7cf87c" @endif>
                    <div class="d-flex flex-row justify-content-between">
                        <p>{{$item->todo}}<p>
                        <div class="d-flex flex-row">
                            <div class="me-2">
                                <form action="{{route('todos.update', ['todo' => $todo])}}"
                                      method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn-sm btn-primary">Edit</button>
                                </form>
                            </div>
                            <div class="me-2">
                                <form action="{{route('items.update', ['item' => $item->id, 'todo' => $todo])}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="complete" value="">
                                    <button type="submit" class="btn-sm btn-success">&#10003;</button>
                                </form>
                            </div>
                            <form action="{{route('items.destroy', ['item' => $item->id, 'todo' => $todo])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-sm btn-danger">Х</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
@endsection
