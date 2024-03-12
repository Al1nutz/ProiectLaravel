@extends('master')

@section('content')
    <h1>Create Sponsor</h1>

    <form method="post" action="{{ route('partener.store') }}">
        @csrf

        <label for="Denumire">Name:</label><br>
        <input type="text" name="Denumire" id="Denumire" required>
        <br>
        <label for="Telefon_partener">Phone Number:</label><br>
        <input type="text" name="Telefon_partener" id="Telefon_partener" required>
        <br>
        <label for="Email_partener">Email:</label><br>
        <input type="email" name="Email_partener" id="Email_partener" required>
        <br><br>

        <button type="submit">Create Sponsor</button>
    </form>
@endsection
