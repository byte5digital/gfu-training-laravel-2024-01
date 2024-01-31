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

                        <div>
                            <x-input-label>Titel</x-input-label>
                            <x-text-input name="title" value="{{ old('title', $thread->title ?? '') }}" class="w-full"></x-text-input>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label>Content</x-input-label>
                            <x-textarea wire:model="content" id="content" name="content">{{ old('content') }}</x-textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <x-primary-button>Thread {{ isset($thread) ? 'aktualisieren' : 'erstellen' }}</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
