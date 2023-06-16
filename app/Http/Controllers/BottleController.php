<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Exception;
use Illuminate\Http\Request;

class BottleController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bottles = Bottle::all();

        return view('admin.bottles.index', compact('bottles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bottles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:bottles',
            'quantity_lt' => 'numeric|nullable',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
            'quantity_lt.numeric' => 'il campo "quantità (lt)" può contenere solo numeri',
        ]);

        try {
            $bottle = new Bottle();
            $bottle->name = $request->name;
            $bottle->description = $request->description;
            $bottle->quantity_lt = $request->quantity_lt;
            $bottle->price = $request->price;
            $bottle->save();

            return redirect()->route('admin.bottles.index')->with('message', "$bottle->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.bottles.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bottle $bottle)
    {
        return view('admin.bottles.show', compact('bottle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bottle $bottle)
    {
        return view('admin.bottles.edit', compact('bottle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bottle $bottle)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity_lt' => 'numeric|nullable',
            'price' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
            'quantity_lt.numeric' => 'il campo "quantità (lt)" può contenere solo numeri',
        ]);

        try {
            $bottle->update([
                'name' => $request->name,
                'description' => $request->description,
                'quantity_lt' => $request->quantity_lt,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.bottles.index')->with('message', "$bottle->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.bottles.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bottle $bottle)
    {
        $bottle->delete();

        return back()->with('message', "$bottle->name eliminato con successo");
    }
}
