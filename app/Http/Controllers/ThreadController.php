<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThreadRequest;
use App\Models\Board;
use App\Models\Thread;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{

    public function index(Board $board): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $threads = $board->threads()->paginate(10);

        return view('boards.index', [
            'board' => $board,
            'threads' => $threads,
        ]);
    }

    public function view(Board $board, Thread $thread)
    {
        return view('threads.view', [
            'thread' => $thread,
        ]);
    }

    protected function form(Board $board): Factory|View
    {
        return view('threads.form')
            ->with('board', $board);
    }

    public function create(Board $board): Factory|View
    {
        return $this->form($board);
    }

    public function edit(Board $board, Thread $thread): Factory|View
    {
        return $this->form($board)
            ->with('thread', $thread);
    }

    public function insert(Board $board, CreateThreadRequest $request)
    {
        $thread = (new Thread)->fill($request->validated());

        $thread->board()->associate($board);

        $thread->user()->associate(Auth::user());

        $thread->save();

        return redirect($thread->url);
    }

}
