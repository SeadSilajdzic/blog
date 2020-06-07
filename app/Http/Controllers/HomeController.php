<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts_count = Post::all()->count();
        $trashed_count = Post::onlyTrashed()->get()->count();
        $users_count = User::all()->count();
        $categories_count = Category::all()->count();

        return view('admin.dashboard', [
            'posts_count' => $posts_count,
            'trashed_count' => $trashed_count,
            'users_count' => $users_count,
            'categories_count' => $categories_count
        ]);
    }
}
