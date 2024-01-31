<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $board->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @auth()
                        <x-link-button href="{{ route('board.thread.create', ['board' => $board]) }}">{{ __('new Thread') }}</x-link-button>
                    @else
                        <x-alert>Bitte anmelden um neue Threads zu erstellen.</x-alert>
                    @endauth

                    @include('threads.list', [
                        'threads' => $threads,
                    ])

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
