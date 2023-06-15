<?php

namespace App\Http\Controllers;

use App\Models\RedWine;
use Exception;
use Illuminate\Http\Request;

class RedWineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $red_wines = RedWine::all();
        return view('admin.red_wines.index', compact('red_wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.red_wines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:red_wines',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
        ]);

        try {
            $red_wine = new RedWine();
            $red_wine->name = $request->name;
            $red_wine->description = $request->description;
            $red_wine->price_bottle = $request->price_bottle;
            $red_wine->price_goblet = $request->price_goblet;
            $red_wine->save();

            return redirect()->route('admin.red_wines.index')->with('message', "$red_wine->name creato con successo");;
        } catch (Exporter $e) {

            return redirect()->route('admin.red_wines.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RedWine $redWine)
    {
        return view('admin.red_wines.show', compact('redWine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RedWine $redWine)
    {
        return view('admin.red_wines.edit', compact('redWine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RedWine $redWine)
    {
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Il nome è richiesto',
        ]);

        try {
            $redWine->update([
                'name' => $request->name,
                'description' => $request->description,
                'price_bottle' => $request->price_bottle,
                'price_goblet' => $request->price_goblet,
            ]);

            return redirect()->route('admin.red_wines.index')->with('message', "$redWine->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.red_wines.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RedWine $redWine)
    {
        $redWine->delete();

        return back()->with('message', "$redWine->name eliminato con successo");
    }
}
