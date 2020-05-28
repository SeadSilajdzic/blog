@extends('layouts.app')

@section('content')

    @if(count($categories) > 0)

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)

                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-outline-danger">x</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h2 class="text-center">There are no any categories. Make some <a href="{{ route('category.create') }}">here</a></h2>
    @endif

@endsection
