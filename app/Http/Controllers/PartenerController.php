<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partener;

class PartenerController extends Controller
{
    protected $model = Partener::class;

    public function index()
    {
        $parteners = Partener::all();
        return view('partener.index', compact('parteners'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Denumire' => 'required',
            'Telefon_partener' => 'required',
            'Email_partener' => 'required|email',
        ]);

        Partener::create($request->all());

        return redirect()->route('partener.index')->with('success', 'Sponsor added successfully');
    }

    public function create()
    {
        return view('partener.create');
    }

    public function update(Request $request, $id_pti)
    {
        $this->validate($request, [
            'Denumire' => 'required',
            'Telefon_partener' => 'required',
            'Email_partener' => 'required|email',
        ]);

        $partener = Partener::findOrFail($id_pti);
        $partener->update($request->all());

        return redirect()->route('partener.index')->with('success', 'Partener updated successfully');
    }

    public function show($id_pti)
    {
        $partener = $this->model::find($id_pti);
        return view('partener.show', compact('partener'));
    }

    public function edit($id_pti)
    {
        $item = Partener::find($id_pti);
        return view('partener.edit', compact('item'));
    }

    public function destroy($id_pti)
    {
        $this->model::find($id_pti)->delete();

        return redirect()->route('partener.index')->with('success', 'Partener removed successfully');
    }
}
