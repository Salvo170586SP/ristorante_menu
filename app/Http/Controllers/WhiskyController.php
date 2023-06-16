<?php

namespace App\Http\Controllers;

use App\Models\Whisky;
use Exception;
use Illuminate\Http\Request;

class WhiskyController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whiskies = Whisky::all();

        return view('admin.whiskies.index', compact('whiskies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.whiskies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:whiskies',
            'quantity_cl' => 'numeric|nullable',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
            'quantity_cl.numeric' => 'il campo "quantità (cl)" può contenere solo numeri',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
        ]);

        try {
            $whisky = new Whisky();
            $whisky->name = $request->name;
            $whisky->description = $request->description;
            $whisky->quantity_cl = $request->quantity_cl;
            $whisky->price = $request->price;
            $whisky->save();

            return redirect()->route('admin.whiskies.index')->with('message', "$whisky->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.whiskies.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Whisky $whisky)
    {
        return view('admin.whiskies.show', compact('whisky'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Whisky $whisky)
    {
        return view('admin.whiskies.edit', compact('whisky'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Whisky $whisky)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity_cl' => 'numeric|nullable',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'quantity_cl.numeric' => 'il campo "quantità (cl)" può contenere solo numeri',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
        ]);

        try {
            $whisky->update([
                'name' => $request->name,
                'description' => $request->description,
                'quantity_cl' => $request->quantity_cl,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.whiskies.index')->with('message', "$whisky->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.whiskies.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Whisky $whisky)
    {
        $whisky->delete();

        return back()->with('message', "$whisky->name eliminato con successo");
    }
}
