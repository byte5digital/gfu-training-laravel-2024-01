<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Board;
use App\Models\Post;
use App\Models\Thread;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function insert(CreatePostRequest $request, Board $board, Thread $thread)
    {
        $post = (new Post)->fill($request->validated());
        $post->user()->associate(auth()->user());
        $post->thread()->associate($thread);
        $post->save();

        return redirect($thread->url);
    }
}
