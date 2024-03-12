@extends('master')

@section('content')
    <h1>Event Details</h1>

    <p>Title: {{ $event->titlu }}</p>
    <p>Start Date: {{ $event->data_inceput }}</p>
    <p>End Date: {{ $event->data_final }}</p>
    <p>Description: {{ $event->descriere }}</p>

    <p>Organizer: {{ $event->organizer->denumire }}</p>
    <p>Location: {{ $event->location->denumire }}</p>

    <p>Agenda:</p>
    <ul>
        @foreach ($event->speakers ?? [] as $speaker)
            <li>{{ $speaker->Nume_speaker }} {{ $speaker->Prenume_speaker }}
                - Date: {{ $speaker->pivot->Data }}
                - Time: {{ $speaker->pivot->ora_inceput }} - {{ $speaker->pivot->ora_sfarsit }}
            </li>
        @endforeach
    </ul>

    <p>Partners:</p>
    <ul>
        @foreach ($event->partners ?? [] as $partner)
            <li>{{ $partner->Denumire }}</li>
        @endforeach
    </ul>

    <a href="{{ route('Event.edit', $event->id_eve) }}">Edit</a>
    <br><br>
    <form action="{{ route('Event.destroy', $event->id_eve) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <br><br>

    @if(Auth::user())
        <h3>Buy Tickets</h3>
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->event_id }}">
            <input type="hidden" name="price" value="{{ $event->event_price }}" id="price">
            <div class="form-group">
                <label for="ticket_type">Ticket Type:</label>
                <select name="ticket_type" id="ticket_type" class="form-control">
                    <option value="general" data-price="30">General Admission</option>
                    <option value="vip" data-price="60">VIP</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
            </div>
            <p id="price_display">Price: $<span>{{ $event->event_price }}</span></p>
            <button type="submit" class="btn btn-primary">Purchase</button>
        </form>

        <script>
            document.getElementById('quantity').addEventListener('input', function() {
                const selectedOption = document.getElementById('ticket_type').options[document.getElementById('ticket_type').selectedIndex];
                const price = selectedOption.getAttribute('data-price');
                const quantity = this.value;
                const totalPrice = price * quantity;

                document.getElementById('price').value = totalPrice;
                document.getElementById('price_display').innerHTML = `Price: $<span>${totalPrice}</span>`;
            });
        </script>
    @else
        <a href="/login">You must be logged in to purchase tickets.</a>
    @endif
@endsection
