<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ThreadController extends Controller
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $threads = Thread::query()->paginate(10);

        return view('threads.list', [
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
