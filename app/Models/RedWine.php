<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedWine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price_bottle', 'price_goblet'];

    //funzione da mettere nel model interessato che serve per convertire la virgola in punto al salvataggio
    public static function boot()
    {
        parent::boot();

        self::saving(function ($redWine) {
            if (!is_null($redWine->price_bottle || $redWine->price_goblet)) {
                $redWine->price_bottle = str_replace(',', '.', $redWine->price_bottle);
                $redWine->price_goblet = str_replace(',', '.', $redWine->price_goblet);
            }
        });
    }
}
