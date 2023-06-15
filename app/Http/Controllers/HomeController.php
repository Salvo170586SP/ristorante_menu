<?php

namespace App\Http\Controllers;

use App\Models\Aperitif;
use App\Models\Beer;
use App\Models\BitterDrink;
use App\Models\Bottle;
use App\Models\Dessert;
use App\Models\InternationalLongDrink;
use App\Models\LongDrink;
use App\Models\RedWine;
use App\Models\SoftDrink;
use App\Models\SpecialLongDrink;
use App\Models\Whisky;
use App\Models\WhiteWine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aperitifs = Aperitif::all();
        $desserts = Dessert::all();
        $longDrinks = LongDrink::all();
        $specialLongDrinks = SpecialLongDrink::all();
        $internationalLongDrinks = InternationalLongDrink::all();
        $whiteWines = WhiteWine::all();
        $redWines = RedWine::all();
        $beers = Beer::all();
        $bitterDrinks = BitterDrink::all();
        $whiskies = Whisky::all();
        $softDrinks = SoftDrink::all();
        $bottles = Bottle::all();


        return view('admin.home', compact('aperitifs', 'desserts', 'longDrinks', 'specialLongDrinks', 'internationalLongDrinks', 'whiteWines', 'redWines', 'beers', 'bitterDrinks', 'whiskies', 'softDrinks', 'bottles'));
    }
}
