@extends('layouts')
@section('head')
    @include('_head')
@endsection

@section('content')
    <div class="w-25 m-auto">
        <a href="{{route('dashboard')}}">Go back</a>
        <p class="mb-1">Add new category</p>
        <div class="mb-2">
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="d-flex flex-row justify-content-between">
                    <input class="form-control" type="text" name="category_name" id="category_name" placeholder="Enter category name">
                    <div class="ms-1">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{route('categories.show', ['category' => $category->id])}}">{{$category->name}}</a>
                        <form action="{{route('categories.destroy', ['category' => $category])}}"
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
