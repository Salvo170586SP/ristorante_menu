<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aperitif extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

     //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
     public static function boot()
     {
         parent::boot();
 
         self::saving(function ($aperitif) {
             if (!is_null($aperitif->price)) {
                 $aperitif->price = str_replace(',', '.', $aperitif->price);
             }
         });
     }
}
