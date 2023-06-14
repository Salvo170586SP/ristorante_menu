<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LongDrink extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];
}
