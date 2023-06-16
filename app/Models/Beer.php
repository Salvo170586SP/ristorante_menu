<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cl', 'price'];

     //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
     public static function boot()
     {
         parent::boot();
 
         self::saving(function ($beer) {
             if (!is_null($beer->price)) {
                 $beer->price = str_replace(',', '.', $beer->price);
             }
         });
     }
}
