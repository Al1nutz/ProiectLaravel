@extends('master')

@section('content')
    <h1>Edit Locatie</h1>

    <form action="{{ route('locatii.update', $locatie->id_lci) }}" method="post">
        @csrf
        @method('PUT')

        <label for="strada">Strada:</label><br>
        <input type="text" name="strada" value="{{ old('strada', $locatie->strada) }}" required />
        <br>

        <label for="numar">Numar:</label><br>
        <input type="text" name="numar" value="{{ old('numar', $locatie->numar) }}" required />
        <br>

        <label for="oras">Oras:</label><br>
        <input type="text" name="oras" value="{{ old('oras', $locatie->oras) }}" required />
        <br>

        <label for="judet">Judet:</label><br>
        <input type="text" name="judet" value="{{ old('judet', $locatie->judet) }}" required />
        <br>

        <label for="capacitate_maxima">Capacitate Maxima:</label><br>
        <input type="text" name="capacitate_maxima" value="{{ old('capacitate_maxima', $locatie->capacitate_maxima) }}" required />
        <br>

        <label for="denumire">Denumire:</label><br>
        <input type="text" name="denumire" value="{{ old('denumire', $locatie->denumire) }}" required />
        <br>
        <br>
        <button type="submit">Update Locatie</button>
    </form>
@endsection
