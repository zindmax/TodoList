@extends('layouts')
@section('head')
    @include('_head')
@endsection

@section('content')
    <div class="m-auto w-25">
        <div class="d-flex justify-content-center mb-4">
            <h1>Create Category</h1>
        </div>
        @error('category_name')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="d-flex flex-column justify-content-between">
                <div class="mb-2">
                    <input class="form-control @error('category_name') is-invalid @enderror"
                           type="text" name="category_name" placeholder="Enter category name">
                </div>
                <button type="submit" class="btn-sm btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection
