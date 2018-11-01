<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // return Post::where('title', 'Post Two')->get();
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
        // $posts = Post::orderBy('title', 'desc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|min:3',
        ]);

        $search = $request->input('search');
        $checkbox = $request->input('nameTable');
        $dropdown = $request->input('dropdown');

        if($checkbox == "kees"){
            $posts = Post::where('body', 'like', "%$search%")->orderBy($dropdown, 'asc')->get();
        } else {
            $posts = Post::where('title', 'like', "%$search%")->orderBy($dropdown, 'desc')->get();
        }
        
        return view('/posts/search')->with('posts', $posts);
    } 
}