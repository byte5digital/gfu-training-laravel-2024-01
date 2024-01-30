<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Thread;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

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


    function getFieldNamesToUpdate(): array
    {
        return [
            'field1',
            'antotherField',
        ];
    }
}
