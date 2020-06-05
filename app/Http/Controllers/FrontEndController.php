<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = Setting::first()->site_name;
        $categories = Category::take(6)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $settings = Setting::first();

        return view('index', [
            'title' => $title,
            'categories' => $categories,
            'first_post' => $first_post,
            'second_post' => $second_post,
            'third_post' => $third_post,
            'settings' => $settings
        ]);

    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::take(6)->get();
        $settings = Setting::first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $next = Post::find($next_id);
        $prev = Post::find($prev_id);

        return view('single', [
            'post' => $post,
            'title' => $post->title,
            'settings' => $settings,
            'categories' => $categories,
            'next' => $next,
            'prev' => $prev
        ]);
    }

    public function category($id)
    {
        $category = Category::find($id);
        $categories = Category::take(6)->get();
        $settings = Setting::first();

        return view('category', [
            'category' => $category,
            'title' => $category->name,
            'settings' => $settings,
            'categories' => $categories,
        ]);
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        $categories = Category::take(6)->get();
        $settings = Setting::first();

        return view('tag', [
           'tag' => $tag,
           'title' => $tag->tag,
            'settings' => $settings,
            'categories' => $categories,
        ]);
    }
}
