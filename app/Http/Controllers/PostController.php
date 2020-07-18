<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts')); //posts.indexにデータを渡す
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post; //インスタンスの作成
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->save(); //インスタンスは保存しないといけない
        return redirect()->route('posts.index');
    }
}
