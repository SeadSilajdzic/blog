@extends('layouts.app')

@section('content')
<div class="card-group">
    <div class="col-lg-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-header text-center">
                PUBLISHED POSTS
            </div>
            <div class="card-body">
                <h1 class="text-center">
                    {{ $posts_count }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header text-center">
                TRASHED POSTS
            </div>
            <div class="card-body">
                <h1 class="text-center">
                    {{ $trashed_count }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header text-center">
                USERS
            </div>
            <div class="card-body">
                <h1 class="text-center">
                    {{ $users_count }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header text-center">
                CATEGORIES
            </div>
            <div class="card-body">
                <h1 class="text-center">
                    {{ $categories_count }}
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection
