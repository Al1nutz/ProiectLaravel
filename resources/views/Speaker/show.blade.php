@extends('master')

@section('content')
    <h1>{{ $speaker->Nume_speaker }} {{ $speaker->Prenume_speaker }}</h1>

    <p>Phone: {{ $speaker->Telefon_speaker }}</p>
    <p>Email: {{ $speaker->Email_speaker }}</p>

    <a href="{{ route('speakers.edit', $speaker->id_spk) }}">Edit Speaker</a>

    <form method="post" action="{{ route('speakers.destroy', $speaker->id_spk) }}">
        @csrf
        @method('delete')
        <br>
        <br>
        <button type="submit">Delete Speaker</button>
    </form>


@endsection
