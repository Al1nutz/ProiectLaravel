@extends('master')

@section('content')
    <h1>{{ $partener->Denumire }} </h1>

    <p>Phone: {{ $partener->Telefon_partener }}</p>
    <p>Email: {{ $partener->Email_partener }}</p>

    <a href="{{ route('partener.edit', $partener->id_pti) }}">Edit Sponsor</a>

    <form method="post" action="{{ route('partener.destroy', $partener->id_pti) }}">
        @csrf
        @method('delete')
        <br>
        <br>
        <button type="submit">Delete Sponsor</button>
    </form>


@endsection
