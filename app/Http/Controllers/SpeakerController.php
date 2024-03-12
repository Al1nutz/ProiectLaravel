<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    protected $model = Speaker::class;

    public function index()
    {
        $speakers = Speaker::all();
        return view('speaker.index', compact('speakers'));
    }

    public function create()
    {
        return view('speaker.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nume_speaker' => 'required',
            'Prenume_speaker' => 'required',
            'Telefon_speaker' => 'required',
            'Email_speaker' => 'required|email',

        ]);


        Speaker::create($request->all());

        return redirect()->route('speakers.index')->with('success', 'Speaker added successfully');
    }

    public function update(Request $request, $id_spk)
    {
        $this->validate($request, [
            'Nume_speaker' => 'required',
            'Prenume_speaker' => 'required',
            'Telefon_speaker' => 'required',
            'Email_speaker' => 'required|email',
        ]);

        $speaker = Speaker::findOrFail($id_spk);
        $speaker->update($request->all());

        return redirect()->route('speakers.index')->with('success', 'Speaker updated successfully');
    }

    public function show($id_spk)
    {
        $speaker = Speaker::find($id_spk);
        return view('speaker.show', compact('speaker'));
    }

    public function edit($id_spk)
    {
        $speaker = Speaker::find($id_spk);
        return view('speaker.edit', compact('speaker'));
    }

    public function destroy($id_spk)
    {
        Speaker::find($id_spk)->delete();

        return redirect()->route('speakers.index')->with('success', 'Speaker removed successfully');
    }
}
