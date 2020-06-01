@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Create new user
    </h2>

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-createUser" class="btn btn-outline-success btn-block">Create user</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection
