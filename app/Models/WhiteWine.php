<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhiteWine extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description', 'price_bottle', 'price_goblet'];

     //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
     public static function boot()
     {
         parent::boot();
 
         self::saving(function ($whiteWine) {
             if (!is_null($whiteWine->price_bottle || $whiteWine->price_goblet)) {
                 $whiteWine->price_bottle = str_replace(',', '.', $whiteWine->price_bottle);
                 $whiteWine->price_goblet = str_replace(',', '.', $whiteWine->price_goblet);
             }
         });
     }
}
