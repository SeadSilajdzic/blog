<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/results', function(){
    $posts = \App\Post::where('title','like',  '%' . request('query') . '%')->get();
    $query = request('query');

    return view('results')->with('posts', $posts)
        ->with('title', 'Search results : ' . request('query'))
        ->with('settings', \App\Setting::first())
        ->with('categories', \App\Category::take(6)->get())
        ->with('query', $query);
});

Route::resource('/', 'FrontEndController');

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::get('/posts/trash/{post}', [
       'uses' => 'PostController@trash',
       'as' => 'posts.trash'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/posts/restore/{post}', [
       'uses' => 'PostController@restore',
       'as' => 'posts.restore'
    ]);

    Route::resource('/posts', 'PostController');

    Route::resource('/category', 'CategoriesController');

    Route::resource('/tags', 'TagsController');

    Route::get('/users/admin/{user}', [
        'uses' => 'UsersController@admin',
        'as' => 'users.admin'
    ])->middleware('admin');

    Route::get('/users/not-admin/{user}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'users.not.admin'
    ])->middleware('admin');

    Route::resource('/users', 'UsersController');
    Route::resource('/user/profile', 'ProfilesController');

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ])->middleware('admin');

    Route::get('/settings/update', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ])->middleware('admin');
});


