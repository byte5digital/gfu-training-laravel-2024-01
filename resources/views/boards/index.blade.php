<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $board->name }}
        </h2>
    </x-slot>

        @auth()
            <a href="{{ route('board.thread.create', ['board' => $board]) }}">new Thread</a>
        @else
            <div>Bitte anmelden um neue Threads zu erstellen.</div>
        @endauth

        @include('threads.list', [
            'threads' => $threads,
        ])

</x-app-layout>
