<?php

namespace App\Http\Controllers;

use App\Models\Aperitif;
use Exception;
use Illuminate\Http\Request;

class AperitifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aperitifs = Aperitif::all();

        return view('admin.aperitifs.index', compact('aperitifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.aperitifs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:aperitifs',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
        ]);

        try {
            $aperitif = new Aperitif();
            $aperitif->name = $request->name;
            $aperitif->description = $request->description;
            $aperitif->price = $request->price;
            $aperitif->save();

            return redirect()->route('admin.aperitifs.index')->with('message', "$aperitif->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.aperitifs.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Aperitif $aperitif)
    {
        return view('admin.aperitifs.show', compact('aperitif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aperitif $aperitif)
    {
        return view('admin.aperitifs.edit', compact('aperitif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aperitif $aperitif)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
        ]);

        try {
            $aperitif->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.aperitifs.index')->with('message', "$aperitif->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.aperitifs.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aperitif $aperitif)
    {
        $aperitif->delete();

        return back()->with('message', "$aperitif->name eliminato con successo");
    }
}
