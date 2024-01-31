
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

<form method="POST" action="{{ route('board.thread.insert', ['board' => $board]) }}">
    {{ csrf_field() }}

    <label for="title">Titel</label>:
    <input type="text" name="title" id="title" value="{{ $thred->title ?? '' }}"><br />
    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="content">Content</label>:
    <textarea name="content" id="content">{{ $thred->title ?? '' }}</textarea><br />
    @error('content')
        <div class="error">{{ $message }}</div>
    @enderror

    <input type="submit" name="submit" value="Thread erstellen">

</form>
