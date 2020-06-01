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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

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

});


