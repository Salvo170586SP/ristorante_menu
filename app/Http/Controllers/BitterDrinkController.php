<?php

namespace App\Http\Controllers;

use App\Models\BitterDrink;
use Exception;
use Illuminate\Http\Request;

class BitterDrinkController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitter_drinks = BitterDrink::all();

        return view('admin.bitter_drinks.index', compact('bitter_drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bitter_drinks.create');
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
            $bitter_drink = new BitterDrink();
            $bitter_drink->name = $request->name;
            $bitter_drink->description = $request->description;
            $bitter_drink->quantity_cl = $request->quantity_cl;
            $bitter_drink->price = $request->price;
            $bitter_drink->save();

            return redirect()->route('admin.bitter_drinks.index')->with('message', "$bitter_drink->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.bitter_drinks.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BitterDrink $bitterDrink)
    {
        return view('admin.bitter_drinks.show', compact('bitterDrink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BitterDrink $bitterDrink)
    {
        return view('admin.bitter_drinks.edit', compact('bitterDrink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BitterDrink $bitterDrink)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $bitterDrink->update([
                'name' => $request->name,
                'description' => $request->description,
                'quantity_cl' => $request->quantity_cl,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.bitter_drinks.index')->with('message', "$bitterDrink->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.bitter_drinks.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BitterDrink $bitterDrink)
    {
        $bitterDrink->delete();

        return back()->with('message', "$bitterDrink->name eliminato con successo");
    }
}
