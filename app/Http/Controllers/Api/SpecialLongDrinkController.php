<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SpecialLongDrink;
use Illuminate\Http\Request;

class SpecialLongDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialLongDrinks = SpecialLongDrink::all();
        return response()->json($specialLongDrinks);
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
        $specialLongDrink = SpecialLongDrink::find($id);
        if(!$specialLongDrink) return response('Special Long Drink Not Found', 404);
        return response()->json($specialLongDrink);
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
