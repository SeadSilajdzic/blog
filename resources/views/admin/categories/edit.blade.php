@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Edit category
    </h2>

    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Category name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-editCategory" class="btn btn-outline-info btn-block">Edit category</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection
