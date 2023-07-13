<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_category', 'name_category_eng', 'user_id', 'position'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

      //FUNZIONA
      public static function boot()
      {
          parent::boot();
          //FUNZIONA
          static::creating(function ($category) {
              $lastPosition = Category::max('position');
              $category->position = $lastPosition + 1;
              Category::where('position', '>=', $category->position)->increment('position');
          });
  
          //FUNZIONA
          static::deleted(function ($category) {
              $category->updatePositionsOnDelete();
          });
      }
  
      //FUNZIONA
      public function updatePositionsOnDelete()
      {
          $deletedPosition = $this->position;
          Category::where('position', '>', $deletedPosition)
              ->orderBy('position')
              ->decrement('position');
      }
}
