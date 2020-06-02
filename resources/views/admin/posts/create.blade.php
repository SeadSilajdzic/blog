@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Create new post
    </h2>

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" name="featured" id="featured">
            <label class="custom-file-label" for="featured">Featured image</label>
        </div>

        <div class="form-group">
            <label for="category_id">Selecet category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option disabled selected>List of available post categories</option>
                @foreach($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Select tags</label>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" name="tags[]" class="form-check-input" id="tags" value="{{ $tag->id }}">
                    <label class="form-check-label" for="tags">{{ $tag->tag }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="summernote" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" name="btn-createPost" class="btn btn-outline-success btn-block">Create post</button>
        </div>
    </form>

@endsection
