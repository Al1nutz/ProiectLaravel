@extends('master')

@section('content')
    <h1>Edit Event</h1>

    <form method="post" action="{{ route('events.update', $event->id_eve) }}">
        @csrf
        @method('put')

        <label for="titlu">Title:</label>
        <input type="text" name="titlu" value="{{ $event->titlu }}" required>

        <label for="data_inceput">Start Date:</label>
        <input type="date" name="data_inceput" value="{{ $event->data_inceput }}" required>

        <label for="data_final">End Date:</label>
        <input type="date" name="data_final" value="{{ $event->data_final }}" required>

        <label for="descriere">Description:</label>
        <textarea name="descriere" required>{{ $event->descriere }}</textarea>
        <button type ="submit">Update Event</button>

@endsection
