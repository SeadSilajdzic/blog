@extends('layouts.app')

@section('content')

    @if(count($tags) > 0)

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Tag</th>
                <th>Created</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)

                <tr>

                    <td>
                        {{ $tag->tag }}
                    </td>

                    <td>
                        {{ $tag->created_at->diffForHumans() }}
                    </td>

                    <td>
                        <form action="{{ route('tags.edit', ['tag' => $tag->id]) }}" method="get">
                            @csrf

                            <button type="submit" name="btn_editTag" class="btn btn-sm btn-outline-info">Edit</button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="post">
                            @csrf
                            @method('Delete')

                            <button type="submit" name="btn_deleteTag" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h2 class="text-center">There are no any tags. Make some <a href="{{ route('tags.create') }}">here</a></h2>
    @endif

@endsection
