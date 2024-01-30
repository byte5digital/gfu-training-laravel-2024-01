@foreach ($threads as $thread)
    <h1>{{ $thread->title }}</h1>

    @foreach ($thread->getContentAsParagraphs() as $paragraph)
        <p>{{$paragraph}}</p>
    @endforeach

    <p><small>Erstellt am {{ $thread->created_at->format('d.m.Y H:i:s') }} Uhr von {{ $thread->user->name }}</small></p>
@endforeach

{{ $threads->links() }}
