@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Featured Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Created</th>
                <th>Edit</th>
                <th>Trash</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <td>
                        {{ $post->id }}
                    </td>

                    <td>
                        <img src="{{ $post->featured }}" alt="Featured image" style="width: 150px; height: 80px;">
                    </td>

                    <td>
                        {{ $post->title }}
                    </td>

                    <td>
                        {{ $post->category->name }}
                    </td>

                    <td>
                        {{ Str::words($post->content, 10) }}
                    </td>

                    <td>
                        {{ $post->created_at->diffForHumans() }}
                    </td>

                    <td>
                        <form action="{{ route('posts.edit', ['post' => $post->id]) }}" method="get">
                            @csrf

                            <button type="submit" name="btn_editPost" class="btn btn-sm btn-outline-info">Edit</button>

                        </form>
                    </td>

                    <td>
                        <form action="{{ route('posts.trash', ['post' => $post->id]) }}" method="get">
                            @csrf

                            <button type="submit" name="btn_trashPost" class="btn btn-sm btn-outline-danger">Trash</button>

                        </form>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h2 class="text-center">There are no any posts. Make some <a href="{{ route('posts.create') }}">here</a></h2>
    @endif

@endsection
