
@extends('master')

@section('content')
    <h1>Locatii List</h1>

    <ul>
        @foreach ($locatii as $locatie)
            <li>
                <a href="{{ route('locatii.show', $locatie->id_lci) }}">{{ $locatie->denumire }}</a>
            </li>
        @endforeach
    </ul>
@endsection
