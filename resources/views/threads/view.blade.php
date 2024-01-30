
<h1>{{ $thread->title }}</h1>

@foreach ($thread->getContentAsParagraphs() as $paragraph)
    <p>{{ $paragraph }}</p>
@endforeach
