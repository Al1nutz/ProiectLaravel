@extends('master')

@section('content')
    <h1>Edit Speaker</h1>

    <form method="post" action="{{ route('speakers.update', $speaker->id_spk) }}">
        @csrf
        @method('put')

        <label for="Nume_speaker">First Name:</label><br>
        <input type="text" name="Nume_speaker" id="Nume_speaker" value="{{ $speaker->Nume_speaker }}" required>
        <br>
        <label for="Prenume_speaker">Last Name:</label><br>
        <input type="text" name="Prenume_speaker" id="Prenume_speaker" value="{{ $speaker->Prenume_speaker }}" required>
        <br>
        <label for="Telefon_speaker">Phone Number:</label>
        <br>
        <input type="text" name="Telefon_speaker" id="Telefon_speaker" value="{{ $speaker->Telefon_speaker }}" required>
        <br>
        <label for="Email_speaker">Email:</label>
        <br>
        <input type="email" name="Email_speaker" id="Email_speaker" value="{{ $speaker->Email_speaker }}" required>
        <br><br>
        <button type="submit">Update Speaker</button>
    </form>
@endsection
