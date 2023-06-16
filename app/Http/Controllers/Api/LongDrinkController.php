<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LongDrink;
use Illuminate\Http\Request;

class LongDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $longDrinks = LongDrink::all();
        return response()->json($longDrinks);
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
        $longDrink = LongDrink::find($id);
        if(!$longDrink) return response('Long Drink Not Found', 404);
        return response()->json($longDrink);
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
