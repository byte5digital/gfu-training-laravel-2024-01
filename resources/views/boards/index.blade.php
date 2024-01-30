@extends('app.layout')

@section('content')

    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $board->name }}</h1>

    @include('threads.list', [
        'threads' => $threads,
    ])

@endsection
