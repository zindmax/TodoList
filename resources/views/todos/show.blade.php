@extends("layouts")

@section("head")
@include("_head")
@endsection

@section("content")
<div class="w-50 m-auto d-flex flex-column">
    <div class="d-flex justify-content-center">
        <h1>{{$todo->name}}</h1>
    </div>
{{--    <a href="{{route('show_category', ['id' => $catId])}}">Go back</a>--}}
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
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <p>{{$item->todo}}<p>
                        <form action="{{route('items.destroy', ['item' => $item->id, 'todo' => $todo])}}" method="post">
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
</div>
@endsection
