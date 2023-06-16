<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SoftDrink;
use Illuminate\Http\Request;

class SoftDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $softDrinks = SoftDrink::all();
        return response()->json($softDrinks);
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
        $softDrink = SoftDrink::find($id);
        if(!$softDrink) return response('Soft Drink Not Found', 404);
        return response()->json($softDrink);
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
