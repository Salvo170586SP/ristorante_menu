<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products',
            'price' => 'numeric|nullable',
            'price_bottle' => 'numeric|nullable',
            'price_goblet' => 'numeric|nullable',
            'quantity_cl' => 'numeric|nullable',
            'quantity_lt' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'name.unique' => 'Il nome è già esistente',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
            'price_bottle.numeric' => 'il campo "prezzo bottiglia" può contenere solo numeri',
            'price_goblet.numeric' => 'il campo "prezzo calice" può contenere solo numeri',
            'quantity_cl.numeric' => 'il campo "quantità cl" può contenere solo numeri',
            'quantity_lt.numeric' => 'il campo "quantità lt" può contenere solo numeri',
        ]);

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->manufacturer = $request->manufacturer;
            $product->price = $request->price;
            $product->price_goblet = $request->price_goblet;
            $product->price_bottle = $request->price_bottle;
            $product->quantity_cl = $request->quantity_cl;
            $product->quantity_lt = $request->quantity_lt;
            $product->category_id = $request->category_id;
            $product->save();

            return redirect()->route('admin.products.index')->with('message', "$product->name creato con successo");;
        } catch (Exception $e) {

            return redirect()->route('admin.products.index')->with('message', 'Errore nella creazione');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'numeric|nullable',
            'price_bottle' => 'numeric|nullable',
            'price_goblet' => 'numeric|nullable',
            'quantity_cl' => 'numeric|nullable',
            'quantity_lt' => 'numeric|nullable',
        ], [
            'name.required' => 'Il nome è richiesto',
            'price.numeric' => 'il campo "prezzo" può contenere solo numeri',
            'price_bottle.numeric' => 'il campo "prezzo bottiglia" può contenere solo numeri',
            'price_goblet.numeric' => 'il campo "prezzo calice" può contenere solo numeri',
            'quantity_cl.numeric' => 'il campo "quantità cl" può contenere solo numeri',
            'quantity_lt.numeric' => 'il campo "quantità lt" può contenere solo numeri',
        ]);

        try {

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'manufacturer' => $request->manufacturer,
                'price' => $request->price,
                'price_goblet' => $request->price_goblet,
                'price_bottle' => $request->price_bottle,
                'quantity_cl' => $request->quantity_cl,
                'quantity_lt' => $request->quantity_lt,
                'category_id' => $request->category_id
            ]);

            return redirect()->route('admin.products.index')->with('message', "$product->name modificato con successo");
        } catch (Exception $e) {

            return redirect()->route('admin.products.index')->with('message', 'Errore nella modifica');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('message', "$product->name eliminato con successo");
    }
}
