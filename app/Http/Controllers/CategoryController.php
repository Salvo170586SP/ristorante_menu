<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(8);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name_category' => 'required|string',
        ], [
            'name_category.required' => 'Il nome è richiesto',
        ]);

        try {
            $category = new Category();
            $category->name_category = $request->name_category;
            $category->user_id = Auth::id();
            $category->save();

            return redirect()->route('admin.categories.index')->with('message', "$category->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.categories.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
       return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         $request->validate([
            'name_category' => 'required|string'
        ], [
            'name_category.required' => 'Il nome è richiesto'
        ]);

        try {

            $category->update([
                'name_category' => $request->name_category,
            ]);

            return redirect()->route('admin.categories.index')->with('message', "$category->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.categories.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         $category->delete();

        return back()->with('message', "$category->name eliminato con successo");
    }
}
