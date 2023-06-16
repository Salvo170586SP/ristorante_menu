<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dessert;
use Illuminate\Http\Request;

class DessertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desserts = Dessert::all();
        return response()->json($desserts);
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
        $dessert = Dessert::find($id);
        if(!$dessert) return response('Dessert Not Found', 404);
        return response()->json($dessert);
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
