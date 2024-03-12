@extends('master')

@section('content')
    <h1>Create Locatie</h1>

    <form action="{{ route('locatii.store') }}" method="post">
        @csrf

        <!-- Form fields for Locatii -->
        <label for="strada">Strada:</label><br>
        <input type="text" name="strada" value="{{ old('strada') }}" required />
        <br>
        <label for="numar">Numar:</label><br>
        <input type="text" name="numar" value="{{ old('numar') }}" required />
        <br>
        <label for="oras">Oras:</label><br>
        <input type="text" name="oras" value="{{ old('oras') }}" required />
        <br>
        <label for="judet">Judet:</label><br>
        <input type="text" name="judet" value="{{ old('judet') }}" required />
        <br>
        <label for="capacitate_maxima">Capacitate Maxima:</label>
        <br>
        <input type="text" name="capacitate_maxima" value="{{ old('capacitate_maxima') }}" required />
        <br>
        <label for="denumire">Denumire:</label><br>
        <input type="text" name="denumire" value="{{ old('denumire') }}" required />

        <!-- Add other fillable fields as needed -->

        <br><br><br><button type="submit">Create Locatie</button>
    </form>
@endsection
