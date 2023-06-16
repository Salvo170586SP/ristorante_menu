<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Whisky;
use Illuminate\Http\Request;

class WhiskyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whiskies = Whisky::all();
        return response()->json($whiskies);
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
        $whisky = Whisky::find($id);
        if(!$whisky) return response('Whisky Not Found', 404);
        return response()->json($whisky);
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
