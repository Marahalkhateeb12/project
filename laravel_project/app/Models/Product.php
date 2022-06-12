<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'item_category_id',
      'item_name',
      'item_description',
      'item_image'
  ];


    public function category()
    {
      return $this->belongsTo(Category::class);
    }
    public function order()
{
   return $this->hasMany(Order::class);
}
}
