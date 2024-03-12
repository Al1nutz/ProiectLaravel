@extends('master')

@section('content')
    <h1>Organizer List</h1>

    <ul>
        @foreach ($organizatori as $organizator)
            <li>
                <a href="{{ route('organizatori.show', $organizator->id_ogi) }}">{{ $organizator->denumire }}</a>
            </li>
        @endforeach
    </ul>
@endsection
