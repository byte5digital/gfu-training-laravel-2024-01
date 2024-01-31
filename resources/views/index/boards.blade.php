<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>

    @foreach($groups as $group)
        <div class="py-12">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $group->name }}</h1>
            <ul>
                @foreach($group->boards as $board)
                    <li>
                        <a href="{{ $board->url }}">{{$board->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

</x-app-layout>
