<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

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

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
