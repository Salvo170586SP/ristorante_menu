<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InternationalLongDrink;
use Illuminate\Http\Request;

class InternationalLongDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $internationalLongDrinks = InternationalLongDrink::all();
        return response()->json($internationalLongDrinks);
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
        $internationalLongDrink = InternationalLongDrink::find($id);
        if(!$internationalLongDrink) return response('International Long Drink Not Found', 404);
        return response()->json($internationalLongDrink);
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
