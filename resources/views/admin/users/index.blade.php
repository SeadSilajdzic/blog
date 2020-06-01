@extends('layouts.app')

@section('content')

    @if(count($users) > 0)

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Featured Image</th>
                <th>Name</th>

                @if(Auth::user()->admin)
                    <th>Permissions</th>
                    <th>Delete</th>
                @else
                    <th>Created</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>
                    <td>
                        {{ $user->id }}
                    </td>

                    <td>
                        <img src="{{ asset($user->profile->avatar) }}" alt="user image" style="height: 70px; width: 70px; border-radius: 50%;">
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    @if(Auth::user()->admin)
                        <td>
                            @if($user->admin)
                                <a href="{{ route('users.not.admin', ['user' => $user->id]) }}" class="btn btn-sm btn-danger">Remove admin</a>
                            @else
                                <a href="{{ route('users.admin', ['user' => $user->id]) }}" class="btn btn-sm btn-success">Make admin</a>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" name="btn_deleteUser" class="btn btn-sm btn-outline-danger">Delete</button>

                            </form>
                        </td>

                    @else
                        <td>
                            {{ $user->created_at->diffForHumans() }}
                        </td>
                    @endif

                </tr>

            @endforeach
            </tbody>
        </table>
    @endif

@endsection
