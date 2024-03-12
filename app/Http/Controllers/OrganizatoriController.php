<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizatori;

class OrganizatoriController extends Controller
{
    public function index()
    {
        $organizatori = Organizatori::all();
        return view('organizatori.list', compact('organizatori'));
    }

    public function create()
    {
        return view('organizatori.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'denumire' => 'required',
            'telefon' => 'required',
            'email' => 'required|email',
        ]);

        Organizatori::create($request->all());

        return redirect()->route('organizatori.index')->with('success', 'Organizer added successfully');
    }

    public function show($id_ogi)
    {
        $organizator = Organizatori::find($id_ogi);
        return view('organizatori.show', compact('organizator'));
    }

    public function edit($id_ogi)
    {
        $organizator = Organizatori::find($id_ogi);
        return view('organizatori.edit', compact('organizator'));
    }

    public function update(Request $request, $id_ogi)
    {
        $this->validate($request, [
            'denumire' => 'required',
            'telefon' => 'required',
            'email' => 'required|email',
        ]);

        Organizatori::find($id_ogi)->update($request->all());

        return redirect()->route('organizatori.index')->with('success', 'Organizer updated successfully');
    }

    public function destroy($id_ogi)
    {
        Organizatori::find($id_ogi)->delete();

        return redirect()->route('organizatori.index')->with('success', 'Organizer removed successfully');
    }
}
