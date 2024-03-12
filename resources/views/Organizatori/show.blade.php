@extends('master')

@section('content')
    <h1>Organizer Details</h1>

    <p>Name: {{ $organizator->denumire }}</p>
    <p>Phone Number: {{ $organizator->telefon }}</p>
    <p>Email: {{ $organizator->email }}</p>

    <a href="{{ route('organizatori.edit', $organizator->id_ogi) }}">Edit</a><br><br>
    <form action="{{ route('organizatori.destroy', $organizator->id_ogi) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
    </form>

@endsection
