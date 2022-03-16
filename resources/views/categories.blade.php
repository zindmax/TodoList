@extends('layouts')
@section('head')
    @include('_head')
@endsection

@section('content')
    <div class="w-25 m-auto">
        <a href="{{route('dashboard')}}">Go back</a>
        <p class="mb-1">Add new category</p>
        <div class="mb-2">
            <form action="{{route('add_category')}}" method="post">
                @csrf
                <div class="d-flex flex-row justify-content-between">
                    <input type="text" name="category_name" id="category_name" placeholder="Enter category name">
                    <button type="submit" class="btn-sm btn-success">Add</button>
                </div>
            </form>
        </div>
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{route('show_category', ['id' => $category->id])}}"><?=$category->name?></a>
                        <form action="{{route('delete_category', ['id' => $category->id])}}"
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
