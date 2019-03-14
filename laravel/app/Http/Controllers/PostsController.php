<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index',[
            'posts' => Post::paginate(3)
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
           'post'=> $post
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index');

    }

    public function edit($post)
    {
        $post=Post::Findorfail($post);
        return view('posts.edit',[
            'post'=>$post
        ]);
    }
    public function update(StorePostRequest $request,$post)
    {
        $post = Post::findorfail($post);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();

        return redirect()->route("posts.index");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }
}
