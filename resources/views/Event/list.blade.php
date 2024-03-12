@extends('master')


@section('content')
    <h1>Event List</h1>

    <ul>
        @foreach ($events as $event)
            <li>
                <a href="{{ route('Event.show', $event->id_eve) }}">{{ $event->titlu }}</a>
            </li>
        @endforeach
    </ul>

    {{ $events->links() }}
@endsection
