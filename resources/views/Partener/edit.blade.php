@extends('master')

@section('content')
    <h1>Edit Partener</h1>

    <form method="post" action="{{ route('partener.update', $item->id_pti) }}">
        @csrf
        @method('put')

        <label for="Denumire">Name:</label><br>
        <input type="text" name="Denumire" id="Denumire" value="{{ $item->Denumire }}" required>
        <br>
        <label for="Telefon_partener">Phone Number:</label><br>
        <input type="text" name="Telefon_partener" id="Telefon_partener" value="{{ $item->Telefon_partener }}" required>
        <br>
        <label for="Email_partener">Email:</label><br>
        <input type="email" name="Email_partener" id="Email_partener" value="{{ $item->Email_partener }}" required>
        <br><br>
        <button type="submit">Update Partener</button>
    </form>
@endsection
