@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Create new tag
    </h2>

    <form action="{{ route('tags.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="tag">Tag name</label>
            <input type="text" name="tag" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-createTag" class="btn btn-outline-success btn-block">Create tag</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection
