<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BitterDrink;
use Illuminate\Http\Request;

class BitterDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitterDrinks = BitterDrink::all();
        return response()->json($bitterDrinks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bitterDrink = BitterDrink::find($id);
        if(!$bitterDrink) return response('Bitter Drink Not Found', 404);
        return response()->json($bitterDrink);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
