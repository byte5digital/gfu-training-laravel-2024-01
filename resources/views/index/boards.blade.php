@extends('app.layout')

@section('content')

    @foreach($groups as $group)
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $group->name }}</h1>
        <ul>
            @foreach($group->boards as $board)
                <li>
                    <a href="{{ $board->url }}">{{$board->name}}</a>
                </li>
            @endforeach
        </ul>
    @endforeach

@endsection
