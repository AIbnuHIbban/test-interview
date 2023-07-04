<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concerts;

class ConcertsController extends Controller
{
    public function index()
    {
        $concerts = Concerts::with('ticketTypes')->get();
        return response()->json($concerts);
    }

    public function create()
    {
        return view('concerts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'venue' => 'required|max:255',
        ]);

        $concert = Concerts::create($validated);
        return redirect()->route('concerts.index');
    }

    public function show($id)
    {
        $concert = Concerts::with(['ticketTypes'])->findOrFail($id);
        return response()->json($concert);
    }

    public function edit($id)
    {
        $concert = Concerts::findOrFail($id);
        return view('concerts.edit', ['concert' => $concert]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'venue' => 'required|max:255',
        ]);

        $concert = Concerts::findOrFail($id);
        $concert->update($validated);
        return redirect()->route('concerts.index');
    }

    public function destroy($id)
    {
        $concert = Concerts::findOrFail($id);
        $concert->delete();
        return redirect()->route('concerts.index');
    }
}
