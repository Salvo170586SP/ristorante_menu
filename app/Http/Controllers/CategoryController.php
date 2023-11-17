<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->orderBy('position', 'ASC')->paginate(8);

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
            $category->name_category_eng = $request->name_category_eng;
            $category->user_id = Auth::id();

            if (array_key_exists('url_img', $request->all())) {
                $url = Storage::put('/imgs_category', $request['url_img']);
                $category->url_img = $url;
            }

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
        if (Auth::id() == $category->user_id) {
            return view('admin.categories.edit', compact('category'));
        } else {
            return abort(403, 'non sei autorizzato');
        }
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

               //UPDATE DELL'IMMAGINE MA SE NON CARICO UN ALTRA IMMAGINE ELIMINA L'IMMAGINE ESISTENTE E METTE IL PLACEHOLDER
               if ($request->hasfile('url_img')) {
                if ($category->url_img == true) {
                    Storage::delete($category->url_img);
                }

                $url = Storage::put('/imgs_category', $request->file('url_img'));
                $category->url_img = $url;
            }

            $category->update([
                'name_category' => $request->name_category,
                'name_category_eng' => $request->name_category_eng,
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
        if ($category->url_img) {
            Storage::delete($category->url_img);
        }

        $category->delete();

        return back()->with('message', "$category->name eliminato con successo");
    }

    public function updatePosition(Request $request, Category $category)
    {
        //FUNZIONANTE
        // Controlla se il nuovo numero di posizione è diverso da quello attuale
        if ($category->position != $request->position) {
            // Calcola la differenza di posizione
            $differenzaPosizione = $request->position - $category->position;

            // Se la nuova posizione è maggiore, sposta gli altri elementi verso l'alto
            if ($differenzaPosizione > 0) {
                Category::where('user_id', '=', Auth::id())->where('position', '>', $category->position)
                    ->where('position', '<=', $request->position)
                    ->decrement('position');
            }

            // Se la nuova posizione è minore, sposta gli altri elementi verso il basso
            elseif ($differenzaPosizione < 0) {
                Category::where('user_id', '=', Auth::id())->where('position', '>=', $request->position)
                    ->where('position', '<', $category->position)
                    ->increment('position');
            }

            // Aggiorna la posizione dell'elemento corrente
            $category->position = $request->position;
            $category->save();
        }

        return redirect()->back()->with('message', "$category->name_category spostato nella posizione $category->position");
    }

    public function delete_img(Category $category)
    {
        if ($category->url_img) {
            Storage::delete($category->url_img);
            // Imposta il campo 'url_img' su null
            $category->url_img = null;
            // Salva le modifiche nel database
            $category->save();
        }

        return back();
    }
}
