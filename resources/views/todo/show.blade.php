@extends("layouts")

@section("head")
@include("_head")
@endsection

@section("content")
<div class="w-50 m-auto d-flex flex-column">
    <div class="mb-2 rounded-pill border border-dark d-flex justify-content-center bg-success">
        <h1><?=$todo->name?></h1>
    </div>
{{--    <a href="{{route('show_category', ['id' => $catId])}}">Go back</a>--}}
    <div class="mb-1">
        <form action="{{@route('items.store', ['id' => $todo->id])}}" method="POST" name="">
            @csrf
            <div class="d-flex flex-row justify-content-between">
                <input type="text" name="todo_add" placeholder="Enter your todo">
                <button type="submit" class="btn-sm btn-success align-self-end">Add</button>
            </div>
        </form>
    </div>
    <div>
        <ul class="list-group">
            @if(isset($items))
                @foreach($items as $item)
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <p><?=$item->todo?><p>
                        <form action="{{route('items.destroy', ['item' => $item->id])}}" method="post">
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
