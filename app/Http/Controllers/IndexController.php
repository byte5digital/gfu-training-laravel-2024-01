<?php

namespace App\Http\Controllers;

use App\Models\BoardGroup;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $groups = BoardGroup::orderBy('name', 'asc')->get();

        return view('index.boards', [
            'groups' => $groups,
        ]);
    }

}
