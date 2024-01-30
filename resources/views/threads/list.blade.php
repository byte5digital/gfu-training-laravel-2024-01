@foreach ($threads as $thread)
    <h2><a href="{{ $thread->url }}">{{ $thread->title }}</a></h2>
    <p><small>Erstellt am {{ $thread->created_at->format('d.m.Y H:i:s') }} Uhr von {{ $thread->user->name }}</small></p>
@endforeach

{{ $threads->links() }}
