@extends('master')

@section('content')
    <h1>Create Speaker</h1>

    <form method="post" action="{{ route('speaker.store') }}">
        @csrf

        <label for="Nume_speaker">First Name:</label><br>
        <input type="text" name="Nume_speaker" id="Nume_speaker" required>
        <br>
        <label for="Prenume_speaker">Last Name:</label><br>
        <input type="text" name="Prenume_speaker" id="Prenume_speaker" required>
        <br>
        <label for="Telefon_speaker">Phone Number:</label><br>
        <input type="text" name="Telefon_speaker" id="Telefon_speaker" required>
        <br>
        <label for="Email_speaker">Email:</label><br>
        <input type="email" name="Email_speaker" id="Email_speaker" required>
        <br>
        <br>
        <button type="submit">Create Speaker</button>
    </form>
@endsection
