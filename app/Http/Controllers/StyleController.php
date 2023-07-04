<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $styles = Style::where('user_id', Auth::id())->get();

        return view('admin.styles.index', compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.styles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $style = new Style();
            $style->user_id = Auth::id();
            $style->color_accordion = $request->color_accordion;
            $style->color_item = $request->color_item;
            $style->font_size = $request->font_size;
            $style->font_size_cat = $request->font_size_cat;
            $style->save();

            return redirect()->route('admin.styles.index');
        } catch (Exception $e) {
            return redirect()->route('admin.styles.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Style $style)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Style $style)
    {
        if (Auth::id() == $style->user_id) {
            return view('admin.styles.edit', compact('style'));
        } else {
            return abort(403, 'non sei autorizzato');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Style $style)
    {
        try {
            $style->update([
                'color_accordion' => $request->color_accordion,
                'color_item' => $request->color_item,
                'font_size' => $request->font_size,
                'font_size_cat' => $request->font_size_cat,
            ]);

            return redirect()->route('admin.styles.index')->with('message', "Modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.styles.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Style $style)
    {
        //
    }
}
