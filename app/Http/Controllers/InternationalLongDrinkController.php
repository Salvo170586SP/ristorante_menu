<?php

namespace App\Http\Controllers;

use App\Models\InternationalLongDrink;
use Exception;
use Illuminate\Http\Request;

class InternationalLongDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $international_long_drinks = InternationalLongDrink::all();

        return view('admin.international_long_drinks.index', compact('international_long_drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.international_long_drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:international_long_drinks',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
        ]);

        try {
            $international_long_drink = new InternationalLongDrink();
            $international_long_drink->name = $request->name;
            $international_long_drink->description = $request->description;
            $international_long_drink->price = $request->price;
            $international_long_drink->save();

            return redirect()->route('admin.international_long_drinks.index')->with('message', "$international_long_drink->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.international_long_drinks.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InternationalLongDrink $internationalLongDrink)
    {
        return view('admin.international_long_drinks.show', compact('internationalLongDrink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternationalLongDrink $internationalLongDrink)
    {
        return view('admin.international_long_drinks.edit', compact('internationalLongDrink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InternationalLongDrink $internationalLongDrink)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
        ]);

        try {
            $internationalLongDrink->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.international_long_drinks.index')->with('message', "$internationalLongDrink->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.international_long_drinks.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternationalLongDrink $internationalLongDrink)
    {
        $internationalLongDrink->delete();

        return back()->with('message', "$internationalLongDrink->name eliminato con successo");
    }
}
