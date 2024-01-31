
@foreach ($threads as $thread)

    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a href="{{ $thread->url }}">{{ $thread->title }}</a></h1>

    <p>
        <small>Erstellt am {{ $thread->created_at->format('d.m.Y H:i:s') }} Uhr von {{ $thread->user->name }}</small>

        @if(auth()->check())

        @endif

    </p>
@endforeach

{{ $threads->links() }}
