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
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <td>
                        {{ $post->id }}
                    </td>

                    <td>
                        {{ $post->featured }}
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

                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h2 class="text-center">There are no any posts. Make some <a href="{{ route('posts.create') }}">here</a></h2>
    @endif

@endsection
