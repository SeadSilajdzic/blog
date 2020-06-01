@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)

        <table class="table table-hover">
            <thead>
            <tr>
                @if(Auth::user()->admin)
                    <th>ID</th>
                @endif
                <th>Featured Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Created</th>
                @if(Auth::user()->admin)
                    <th>Edit</th>
                    <th>Trash</th>
                @endif

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    @if(Auth::user()->admin)
                        <td>
                            {{ $post->id }}
                        </td>
                    @endif


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

                    @if(Auth::user()->admin)
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
                    @endif

                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h2 class="text-center">There are no any posts. Make some <a href="{{ route('posts.create') }}">here</a></h2>
    @endif

@endsection
