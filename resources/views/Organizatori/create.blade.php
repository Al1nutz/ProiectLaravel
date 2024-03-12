@extends('master')

@section('content')
    <h1>Create Organizer</h1>

    <form method="post" action="{{ route('organizatori.store') }}">
        @csrf

        <label for="denumire">Name:</label>
        <input type="text" name="denumire" required>

        <label for="telefon">Phone Number:</label>
        <input type="text" name="telefon" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Create Organizer</button>
    </form>
@endsection
