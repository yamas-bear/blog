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

    public function show($id)
    {
        $post = Post::find($id); //Postモデルから$idと一致するものを見つけてくださいということ
        return view('posts.show', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $post = new Post; //インスタンスの作成
        $post->title = $request->title; //プロパティの設定
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->save(); //インスタンスは保存しないといけない
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id) //PostRequestを通すことでバリデーションを行っている
    {
        $post = Post::find($id); //idを用いて更新したいPostを探す

        $post->title    = $request->title;
        $post->body     = $request->body;

        $post->save();

        return view('posts.show', compact('post'));
    }
}
