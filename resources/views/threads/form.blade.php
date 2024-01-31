<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new Thread') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('board.thread.insert', ['board' => $board]) }}">
                        {{ csrf_field() }}

                        <label for="title">Titel</label>:
                        <input type="text" name="title" id="title" value="{{ $thread->title ?? '' }}"><br />
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="content">Content</label>:
                        <textarea name="content" id="content">{{ $thread->content ?? '' }}</textarea><br />
                        @error('content')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="submit" name="submit" value="Thread {{ isset($thread) ? 'aktualisieren' : 'erstellen' }}">
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
