@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Create new category
    </h2>

    <form action="{{ route('category.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Category name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-createCategory" class="btn btn-outline-success btn-block">Create category</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection
