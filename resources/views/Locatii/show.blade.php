@extends('master')

@section('content')
    <h1>Locatie Details</h1>

    <p>Denumire: {{ $locatie->denumire }}</p>
    <p>Strada: {{ $locatie->strada }}</p>
    <p>Numar: {{ $locatie->numar }}</p>
    <p>Oras: {{ $locatie->oras }}</p>
    <p>Judet: {{ $locatie->judet }}</p>
    <p>Capacitate Maxima: {{ $locatie->capacitate_maxima }}</p>

    <a href="{{ route('locatii.edit', $locatie->id_lci) }}">Edit</a><br>
    <br>
    <form action="{{ route('locatii.destroy', $locatie->id_lci) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
    </form>
@endsection
