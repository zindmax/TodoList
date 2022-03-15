@extends("layouts")

@section("head")
    @include("_head")
@endsection

@section("content")
    <div class="w-25 m-auto d-flex flex-column">
        <div class="mb-1">
            <form action="{{@route("add_todo")}}" method="POST" name="">
                @csrf
                <div class="d-flex flex-row justify-content-between">
                    <input type="text" name="todo_add" placeholder="Enter your todo">
                    <button type="submit" class="btn-sm btn-primary align-self-end">Add</button>
                </div>
            </form>
        </div>
        <div>
            <ul class="list-group">
                @foreach($todos as $todo)
                        <li class="list-group-item">
                            <div class="d-flex flex-row justify-content-between">
                                <? echo $todo->todo?>
                                <div class="d-flex flex-row">
                                    <form action="{{route("delete_todo", ["id" => $todo->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-sm btn-danger">Х</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

