<?php

namespace App\Http\Controllers;

use App\Models\SpecialLongDrink;
use Exception;
use Illuminate\Http\Request;

class SpecialLongDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $special_long_drinks = SpecialLongDrink::all();
        return view('admin.special_long_drinks.index', compact('special_long_drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.special_long_drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:special_long_drinks',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
        ]);

        try {
            $special_long_drink = new SpecialLongDrink();
            $special_long_drink->name = $request->name;
            $special_long_drink->description = $request->description;
            $special_long_drink->price = $request->price;
            $special_long_drink->save();

            return redirect()->route('admin.special_long_drinks.index')->with('message', "$special_long_drink->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.special_long_drinks.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SpecialLongDrink $specialLongDrink)
    {
        return view('admin.special_long_drinks.show', compact('specialLongDrink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpecialLongDrink $specialLongDrink)
    {
        return view('admin.special_long_drinks.edit', compact('specialLongDrink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpecialLongDrink $specialLongDrink)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $specialLongDrink->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.special_long_drinks.index')->with('message', "$specialLongDrink->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.special_long_drinks.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpecialLongDrink $specialLongDrink)
    {
        $specialLongDrink->delete();

        return back()->with('message', "$specialLongDrink->name eliminato con successo");
    }
}
