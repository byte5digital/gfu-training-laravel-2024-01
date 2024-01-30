
@foreach($groups as $group)
    <h1>{{ $group->name }}</h1>
    <ul>
        @foreach($group->boards as $board)
            <li>
                <a href="{{ $board->url }}">{{$board->name}}</a>
            </li>
        @endforeach
    </ul>
@endforeach
