@extends('layouts.app')

@section('content')

    <h2 class="text-center">
        Edit site settings
    </h2>

    <form action="{{ route('settings.update') }}" method="get" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="site_name">Site name</label>
            <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
        </div>

        <div class="form-group">
            <label for="contact_number">Contact number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
        </div>

        <div class="form-group">
            <label for="contact_email">Contact email</label>
            <input type="email" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-editSiteSettings" class="btn btn-outline-success btn-block">Update site</button>
        </div>
    </form>

    @include('admin.includes.errors')

@endsection
