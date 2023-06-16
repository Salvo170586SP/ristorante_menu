<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'quantity_lt', 'price'];

     //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
     public static function boot()
     {
         parent::boot();
 
         self::saving(function ($bottle) {
             if (!is_null($bottle->price)) {
                 $bottle->price = str_replace(',', '.', $bottle->price);
             }
         });
     }
}
