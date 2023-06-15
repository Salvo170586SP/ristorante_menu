<?php

namespace App\Http\Controllers;

use App\Models\WhiteWine;
use Exception;
use Illuminate\Http\Request;

class WhiteWineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $white_wines = WhiteWine::all();
        return view('admin.white_wines.index', compact('white_wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.white_wines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:white_wines',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
        ]);

        try {
            $white_wine = new WhiteWine();
            $white_wine->name = $request->name;
            $white_wine->description = $request->description;
            $white_wine->price_bottle = $request->price_bottle;
            $white_wine->price_goblet = $request->price_goblet;
            $white_wine->save();

            return redirect()->route('admin.white_wines.index')->with('message', "$white_wine->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.white_wines.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WhiteWine $whiteWine)
    {
        return view('admin.white_wines.show', compact('whiteWine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhiteWine $whiteWine)
    {
        return view('admin.white_wines.edit', compact('whiteWine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhiteWine $whiteWine)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $whiteWine->update([
                'name' => $request->name,
                'description' => $request->description,
                'price_bottle' => $request->price_bottle,
                'price_goblet' => $request->price_goblet,
            ]);

            return redirect()->route('admin.white_wines.index')->with('message', "$whiteWine->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.white_wines.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhiteWine $whiteWine)
    {
        $whiteWine->delete();

        return back()->with('message', "$whiteWine->name eliminato con successo");
    }
}
