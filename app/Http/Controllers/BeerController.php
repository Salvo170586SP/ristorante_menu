<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Exception;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beers = Beer::all();

        return view('admin.beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.beers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:beers',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
        ]);

        try {
            $beer = new Beer();
            $beer->name = $request->name;
            $beer->description = $request->description;
            $beer->cl = $request->cl;
            $beer->price = $request->price;
            $beer->save();

            return redirect()->route('admin.beers.index')->with('message', "$beer->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.beers.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {
        return view('admin.beers.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beer $beer)
    {
        return view('admin.beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beer $beer)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $beer->update([
                'name' => $request->name,
                'description' => $request->description,
                'cl' => $request->cl,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.beers.index')->with('message', "$beer->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.beers.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();

        return back()->with('message', "$beer->name eliminato con successo");
    }
}
