
<form method="POST" action="{{ route('board.thread.post.insert', ['thread' => $thread, 'board' => $thread->board]) }}">
    {{ csrf_field() }}

    <div>
        <x-textarea wire:model="content" id="content" name="content">{{ old('content') }}</x-textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
    </div>

    <x-primary-button>Post erstellen</x-primary-button>
</form>
