@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        <strong>Edit tag : </strong> "{{ $tag->tag }}"
    </h2>

    <form action="{{ route('tags.update', ['tag' => $tag->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tag">Tag name</label>
            <input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-editTag" class="btn btn-outline-info btn-block">Edit tag</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection
