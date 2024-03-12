@extends('master')

@section('content')
    <h1>Sponsors</h1>

    <ul>
        @forelse ($parteners as $partener)
            <li><a href="{{ route('partener.show', $partener->id_pti) }}">{{ $partener->Denumire }} </a></li>
        @empty
            <p>No sponsors available</p>
        @endforelse
    </ul>
@endsection
