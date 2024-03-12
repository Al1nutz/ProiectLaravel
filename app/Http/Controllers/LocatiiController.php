<?php

namespace App\Http\Controllers;

use App\Models\Locatii;
use Illuminate\Http\Request;

class LocatiiController extends Controller
{
    public function index()
    {
        $locatii = Locatii::all();

        return view('locatii.list', compact('locatii'));
    }

    public function create()
    {
        return view('locatii.create');
    }

    public function store(Request $request)
    {
        // Validate and store data
        $data = $request->validate([
            'denumire' => 'required',
            'strada' => 'required',
            'numar' => 'required',
            'oras' => 'required',
            'judet' => 'required',
            'capacitate_maxima' => 'required',
        ]);

        Locatii::create($data);

        return redirect()->route('locatii.index');
    }

    public function show($id)
    {
        $locatie = Locatii::findOrFail($id);

        return view('locatii.show', compact('locatie'));
    }

    public function edit($id)
    {
        $locatie = Locatii::findOrFail($id);

        return view('locatii.edit', compact('locatie'));
    }

    public function update(Request $request, $id)
    {
        $locatie = Locatii::findOrFail($id);

        $data = $request->validate([
            'strada' => 'required',
            'numar' => 'required',
            'oras' => 'required',
            'judet' => 'required',
            'capacitate_maxima' => 'required',
            'denumire' => 'required',
        ]);

        $locatie->update($data);

        return redirect()->route('locatii.index');
    }

    public function destroy($id)
    {
        $locatie = Locatii::findOrFail($id);
        $locatie->delete();

        return redirect()->route('locatii.index');
    }
}
