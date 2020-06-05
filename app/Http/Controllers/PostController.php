<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        if($posts->count() == 0){
            return redirect()->route('posts.create')->with('toast_warning', 'You do not have any posts yet. Make some here!');
        }

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0){
            return redirect()->route('category.create')->with('toast_warning', 'You do not have any categories yet. Make some here!');
        } elseif ($tags->count() == 0){
            return redirect()->route('tags.create')->with('toast_warning', 'You do not have any tags yet. Make some here!');
        }

        return view('admin.posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|min:5|max:255',
           'content' => 'required|min:15',
            'featured' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => '/uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id(),
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('toast_success', 'Post has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'title' => 'required|min:5|max:255',
           'content' => 'required|min:5',
           'category_id' => 'required',
            'slug' => Str::slug($request->title),
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('featured')){
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = '/uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($request->title);

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('toast_info', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        $trashed = Post::onlyTrashed()->get();

        if($trashed->count() == 0)
        {
            return redirect()->route('posts.index')->with('toast_error', 'Your post has been deleted');
        }
        else
        {
            return redirect()->back()->with('toast_error', 'Your post has been deleted');
        }

    }

    /**
     * This function is responsible for trashing posts
     *
     * */
    public function trash($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->route('posts.index')->with('toast_warning', 'Your post has been trashed');
    }

    /**
     * This function is displaying trashed posts
     *
     * */
    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', ['posts' => $posts]);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        $trashed = Post::onlyTrashed()->get();

        if($trashed->count() == 0)
        {
            return redirect()->route('posts.index')->with('toast_success', 'Your post has been restored');
        }
        else
        {
            return redirect()->back()->with('toast_success', 'Your post has been restored');
        }


    }



}
