@extends('master')

@section('content')
    <h1>Speakers</h1>

    <ul>
        @forelse ($speakers as $speaker)
            <li>
                <a href="{{ route('speaker.show', $speaker->id_spk) }}">{{ $speaker->Nume_speaker }} {{ $speaker->Prenume_speaker }}</a>
            </li>
        @empty
            <p>No speakers available</p>
        @endforelse
    </ul>
@endsection
