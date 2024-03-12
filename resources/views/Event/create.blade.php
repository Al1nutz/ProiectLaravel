@extends('master')

@section('content')
    <h1>Create Event</h1>

    <form method="post" action="{{ route('events.store') }}">
        @csrf

        <label for="titlu">Title:</label>
        <input type="text" name="titlu" required>

        <label for="data_inceput">Start Date:</label>
        <input type="date" name="data_inceput" required>

        <label for="data_final">End Date:</label>
        <input type="date" name="data_final" required>

        <label for="descriere">Description:</label>
        <textarea name="descriere" required></textarea>

        <!-- Select Organizer -->
        <label for="id_ogi">Organizer:</label>
        <select name="id_ogi" required>
            @foreach($organizatori as $organizator)
                <option value="{{ $organizator->id_ogi }}">{{ $organizator->denumire }}</option>
            @endforeach
        </select>

        <!-- Select Location -->
        <label for="id_lci">Location:</label>
        <select name="id_lci" required>
            @foreach($locations as $location)
                <option value="{{ $location->id_lci }}">{{ $location->denumire }}</option>
            @endforeach
        </select>

        <!-- Speaker Fields -->
        <div id="speakers">
            <div id="speakerFields">
                <label for="speakers">Select Speakers:</label>
                <select name="speakers[]" required>
                    @foreach($speakers as $speaker)
                        <option value="{{ $speaker->id_spk }}">{{ $speaker->Nume_speaker }} {{ $speaker->Prenume_speaker }}</option>
                    @endforeach
                </select>

                <!-- ContracteSpeakeri Fields -->
                <label for="contracte_speakeri[data][]">Date:</label>
                <input type="date" name="contracte_speakeri[data][]" required>

                <label for="contracte_speakeri[ora_inceput][]">Start Time:</label>
                <input type="time" name="contracte_speakeri[ora_inceput][]" required>

                <label for="contracte_speakeri[ora_sfarsit][]">End Time:</label>
                <input type="time" name="contracte_speakeri[ora_sfarsit][]" required>

                <label for="contracte_speakeri[tarif][]">Fee:</label>
                <input type="text" name="contracte_speakeri[tarif][]" required>

                <button type="button" onclick="removeSpeaker(this)">Remove Speaker</button>
            </div>
        </div>

        <button type="button" onclick="addSpeaker()">Add Speaker</button>

        <!-- Parteneri Fields -->
        <div id="partners">
            <div id="partnerFields">
                <label for="partners">Select Partners:</label>
                <select name="partners[]" required>
                    @foreach($partners as $partner)
                        <option value="{{ $partner->id_pti }}">{{ $partner->Denumire }}</option>
                    @endforeach
                </select>

                <!-- ContracteParteneri Fields -->
                <label for="contracte_parteneri[valoare_sponsorizata][]">Sponsorship Amount:</label>
                <input type="text" name="contracte_parteneri[valoare_sponsorizata][]" required>

                <button type="button" onclick="removePartner(this)">Remove Partner</button>
            </div>
        </div>

        <button type="button" onclick="addPartner()">Add Partner</button>

        <button type="submit">Create Event</button>
    </form>

    <script>
        function addSpeaker() {
            var speakerFields = document.getElementById('speakerFields');
            var clone = speakerFields.cloneNode(true);
            document.getElementById('speakers').appendChild(clone);
        }

        function removeSpeaker(button) {
            button.parentNode.parentNode.removeChild(button.parentNode);
        }

        function addPartner() {
            var partnerFields = document.getElementById('partnerFields');
            var clone = partnerFields.cloneNode(true);
            document.getElementById('partners').appendChild(clone);
        }

        function removePartner(button) {
            button.parentNode.parentNode.removeChild(button.parentNode);
        }
    </script>
@endsection
