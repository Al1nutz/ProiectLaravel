<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Partener;
use App\Models\Locatii;
use App\Models\Organizatori;
use App\Models\ContracteSpeakeri;
use App\Models\ContracteParteneri;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('titlu', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('Event.list', compact('events'))->with('i', $value);
    }


    public function create()
    {
        $organizatori = Organizatori::all();
        $speakers = Speaker::all();
        $partners = Partener::all();
        $locations = Locatii::all();

        return view('Event.create', compact('organizatori', 'speakers', 'partners', 'locations'));
    }

    public function store(Request $request)
    {


        // Create a new event
        $event = Event::create($request->only(['titlu', 'data_inceput', 'data_final', 'descriere', 'id_ogi', 'id_lci']));

        $this->saveSpeakers($request->input('speakers'), $event->id_eve, $request->input('contracte_speakeri'));
        $this->savePartners($request->input('partners'), $event->id_eve, $request->input('contracte_parteneri'));

        return redirect()->route('Event.index')->with('success', 'Your event added successfully!');
    }

    private function validateEvent(Request $request)
    {
        $this->validate($request, [
            'titlu' => 'required',
            'data_inceput' => 'required|date',
            'data_final' => 'required|date|after:data_inceput',
            'descriere' => 'required',
            'id_ogi' => 'required',
            'id_lci' => 'required',
            'speakers.*' => 'required',
            'partners.*' => 'required',
            'contracte_speakeri.*.data' => 'required|date|after_or_equal:data_inceput|before_or_equal:data_final',
            'contracte_parteneri.*.valoare_sponsorizata' => 'required|numeric|min:0',
        ]);
    }

    private function saveSpeakers($speakerIds, $eventId, $contractData)
    {
        foreach ($speakerIds as $key => $selectedSpeakerId) {
            // Ensure the selected speaker ID is present
            if (!$selectedSpeakerId) {
                continue;
            }

            // Retrieve the selected speaker based on the provided $selectedSpeakerId
            $selectedSpeaker = Speaker::find($selectedSpeakerId);

            // Check if the selected speaker exists
            if ($selectedSpeaker) {
                $data = [
                    'id_spk' => $selectedSpeaker->id_spk,  // Use the ID of the selected speaker
                    'id_eve' => $eventId,
                    'Data' => $contractData['data'][$key] ?? now()->toDateString(),
                    'ora_inceput' => $contractData['ora_inceput'][$key] ?? now()->toTimeString(),
                    'ora_sfarsit' => $contractData['ora_sfarsit'][$key] ?? now()->addHour()->toTimeString(),
                    'tarif' => $contractData['tarif'][$key] ?? 0, // Replace 0 with the appropriate default value
                ];

                // Check if all required fields have values
                if ($data['Data'] && $data['ora_inceput'] && $data['ora_sfarsit']) {
                    // Create a new ContracteSpeakeri instance
                    $contracteSpeakeri = new ContracteSpeakeri($data);

                    // Save the ContracteSpeakeri instance
                    $contracteSpeakeri->save();
                }
            }
        }
    }


    private function savePartners($partnerIds, $eventId, $contractData)
    {
        if (!empty($partnerIds)) {
            foreach ($partnerIds as $key => $partnerId) {
                $data = [
                    'id_pti' => $partnerId,
                    'id_eve' => $eventId,
                    'valoare_sponsorizata' => $contractData['valoare_sponsorizata'][$key] ?? null,
                ];

                ContracteParteneri::create(array_filter($data)); // Filter out null values
            }
        }
    }

    public function show($id_eve)
    {
        $event = Event::with(['speakers', 'partners'])->find($id_eve);
        return view('Event.show', compact('event'));
    }

    public function edit($id_eve)
    {
        $event = Event::find($id_eve);
        $organizatori = Organizatori::all();
        $locations = Locatii::all();
        $speakers = Speaker::all();
        $partners = Partener::all();

        return view('Event.edit', compact('event', 'organizatori', 'locations', 'speakers', 'partners'));
    }

    public function update(Request $request, $id_eve)
    {
        $event = Event::find($id_eve);

        // Update each field one at a time
        $event->update(['titlu' => $request->input('titlu')]);
        $event->update(['data_inceput' => $request->input('data_inceput')]);
        $event->update(['data_final' => $request->input('data_final')]);
        $event->update(['descriere' => $request->input('descriere')]);


        return redirect()->route('Event.index')->with('success', 'Event updated successfully');
    }


    private function syncSpeakers($speakerIds, $contractData, Event $event)
    {
        $speakersData = [];
        foreach ($speakerIds as $key => $speakerId) {
            $speakersData[$speakerId] = [
                'data' => $contractData['data'][$key],
                'ora_inceput' => $contractData['ora_inceput'][$key],
                'ora_sfarsit' => $contractData['ora_sfarsit'][$key],
                'tarif' => $contractData['tarif'][$key],
            ];
        }

        $event->speakers()->sync($speakersData);
    }

    private function syncPartners($partnerIds, $contractData, Event $event)
    {
        $partnersData = [];
        foreach ($partnerIds as $key => $partnerId) {
            $partnersData[$partnerId] = [
                'valoare_sponsorizata' => $contractData['valoare_sponsorizata'][$key],
            ];
        }

        $event->partners()->sync($partnersData);
    }

    public function destroy($id_eve)
    {
        Event::find($id_eve)->delete();

        return redirect()->route('Event.index')->with('success', 'Event removed successfully');
    }
}
