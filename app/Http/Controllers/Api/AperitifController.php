<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aperitif;
use Illuminate\Http\Request;

class AperitifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aperitifs = Aperitif::all();
        return response()->json($aperitifs);
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
        $aperitif = Aperitif::find($id);
        if(!$aperitif) return response('Aperitif Not Found', 404);
        return response()->json($aperitif);
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
