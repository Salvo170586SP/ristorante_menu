<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WhiteWine;
use Illuminate\Http\Request;

class WhiteWineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whiteWines = WhiteWine::all();
        return response()->json($whiteWines);
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
        $whiteWine = WhiteWine::find($id);
        if(!$whiteWine) return response('White Wine Not Found', 404);
        return response()->json($whiteWine);
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
