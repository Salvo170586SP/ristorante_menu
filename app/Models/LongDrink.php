<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LongDrink extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
    public static function boot()
    {
        parent::boot();

        self::saving(function ($longDrink) {
            if (!is_null($longDrink->price)) {
                $longDrink->price = str_replace(',', '.', $longDrink->price);
            }
        });
    }
}
