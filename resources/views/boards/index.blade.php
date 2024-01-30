
<h1>{{ $board->name }}</h1>

@include('threads.list', [
    'threads' => $threads,
]);
