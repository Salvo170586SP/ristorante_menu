<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bottle;
use Illuminate\Http\Request;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bottles = Bottle::all();
        return response()->json($bottles);
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
        $bottle = Bottle::find($id);
        if(!$bottle) return response('Bottle Not Found', 404);
        return response()->json($bottle);
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
