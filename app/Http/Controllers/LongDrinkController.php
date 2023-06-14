<?php

namespace App\Http\Controllers;

use App\Models\LongDrink;
use Exception;
use Illuminate\Http\Request;

class LongDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $long_drinks = LongDrink::all();
        return view('admin.long_drinks.index', compact('long_drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.long_drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:long_drinks',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
        ]);

        try {
            $long_drink = new LongDrink();
            $long_drink->name = $request->name;
            $long_drink->description = $request->description;
            $long_drink->price = $request->price;
            $long_drink->save();

            return redirect()->route('admin.long_drinks.index')->with('message', "$long_drink->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.long_drinks.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LongDrink $longDrink)
    {
        return view('admin.long_drinks.show', compact('longDrink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LongDrink $longDrink)
    {
        return view('admin.long_drinks.edit', compact('longDrink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LongDrink $longDrink)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $longDrink->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.long_drinks.index')->with('message', "$longDrink->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.long_drinks.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LongDrink $longDrink)
    {
        $longDrink->delete();

        return back()->with('message', "$longDrink->name eliminato con successo");
    }
}
