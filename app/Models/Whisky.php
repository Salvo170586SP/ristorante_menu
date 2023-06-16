<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whisky extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'quantity_cl', 'price'];

     //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
     public static function boot()
     {
         parent::boot();
 
         self::saving(function ($whisky) {
             if (!is_null($whisky->price)) {
                 $whisky->price = str_replace(',', '.', $whisky->price);
             }
         });
     }
}
