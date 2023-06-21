<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'manufacturer',
        'price',
        'price_goblet',
        'price_bottle',
        'quantity_cl',
        'quantity_lt',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
