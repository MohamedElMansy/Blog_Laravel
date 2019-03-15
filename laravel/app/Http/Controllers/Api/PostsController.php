<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return PostResource::collection($posts);
    }

    public function show($post)
    {

        $post=Post::findorfail($post);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return response()->json(["post created successfully"],201);
    }
}
