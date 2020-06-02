@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Edit your profile {{ $user->name }}
    </h2>

    <form action="{{ route('profile.update', ['profile' => $user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="password">New password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" name="avatar" id="avatar">
            <label class="custom-file-label" for="avatar">Profile image</label>
        </div>

        <div class="form-group">
            <label for="about">About</label>
            <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{ $user->profile->about }} </textarea>
        </div>

        <div class="form-group">
            <label for="facebook">Facebook account</label>
            <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
        </div>

        <div class="form-group">
            <label for="linkedin">Linkedin account</label>
            <input type="text" name="linkedin" class="form-control" value="{{ $user->profile->linkedin }}">
        </div>

        <div class="form-group">
            <label for="youtube">Youtube account</label>
            <input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
        </div>

        <div class="form-group">
            <label for="github">Github account</label>
            <input type="text" name="github" class="form-control" value="{{ $user->profile->github }}">
        </div>

        <div class="form-group">
            <label for="instagram">Instagram account</label>
            <input type="text" name="instagram" class="form-control" value="{{ $user->profile->instagram }}">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-editProfile" class="btn btn-outline-success btn-block">Update profile</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection

