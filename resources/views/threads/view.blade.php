<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $thread->title }}
        </h2>
    </x-slot>

    @foreach ($thread->getContentAsParagraphs() as $paragraph)
        <p>{{ $paragraph }}</p>
    @endforeach

</x-app-layout>>
