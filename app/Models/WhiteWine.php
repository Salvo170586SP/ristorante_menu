<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhiteWine extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description', 'price_bottle', 'price_goblet'];
}
