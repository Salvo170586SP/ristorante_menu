<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use Exception;
use Illuminate\Http\Request;

class DessertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desserts = Dessert::all();
        return view('admin.desserts.index', compact('desserts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.desserts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:desserts',
            ], [
                'name.required' => 'Il nome è richiesto',
                'name.unique' => 'Il nome è già esistente',
            ]);
    
            try {
                $dessert = new Dessert();
                $dessert->name = $request->name;
                $dessert->description = $request->description;
                $dessert->price = $request->price;
                $dessert->save();
    
                return redirect()->route('admin.desserts.index')->with('message', "$dessert->name creato con successo");;
            } catch (Exception $e) {
    
                return redirect()->route('admin.desserts.index')->with('message', 'Errore nella creazione');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dessert $dessert)
    {
        return view('admin.desserts.show', compact('dessert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dessert $dessert)
    {
        return view('admin.desserts.edit', compact('dessert'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dessert $dessert)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $dessert->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            return redirect()->route('admin.desserts.index')->with('message', "$dessert->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.desserts.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dessert $dessert)
    {
        $dessert->delete();

        return back()->with('message', "$dessert->name eliminato con successo");
    }
}
