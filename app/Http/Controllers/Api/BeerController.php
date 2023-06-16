<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beers = Beer::all();
        return response()->json($beers);
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
        $beer = Beer::find($id);
        if(!$beer) return response('Beer Not Found', 404);
        return response()->json($beer);
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
