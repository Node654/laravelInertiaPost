<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        Inertia::share('posts', PostResource::collection(Post::all())->resolve());
        return Inertia::render('Post/Index');
    }

    public function show(Post $post)
    {
        Inertia::share('post', PostResource::make($post)->resolve());
        return Inertia::render('Post/Show');
    }

    public function create()
    {
        return Inertia::render('Post/Create');
    }

    public function store(StoreRequest $request)
    {
        return to_route('posts.show', ['post' => PostResource::make(Post::create($request->validated()))]);
    }

    public function edit(Post $post)
    {
        Inertia::share('post', PostResource::make($post)->resolve());
        return Inertia::render('Post/Update');
    }

    public function update(UpdateRequest $request)
    {
        $post = Post::find($request->id);
        $post->update($request->validated());
        return to_route('posts.show', ['post' => PostResource::make($post)]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
