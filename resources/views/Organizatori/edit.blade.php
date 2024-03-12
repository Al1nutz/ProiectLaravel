@extends('master')

@section('content')
    <h1>Edit Organizer</h1>

    <form method="post" action="{{ route('organizatori.update', $organizator->id_ogi) }}">
        @csrf
        @method('put')

        <label for="denumire">Name:</label>
        <input type="text" name="denumire" value="{{ $organizator->denumire }}" required>

        <label for="telefon">Phone Number:</label>
        <input type="text" name="telefon" value="{{ $organizator->telefon }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $organizator->email }}" required>

        <button type="submit">Update Organizer</button>
    </form>
@endsection

