<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_order_id',
      'product_order_id'
  ];
    public function product()
    {
       return $this->belongsTo(Product::class);
    }
    public function users()
    {
       return $this->belongsTo(User::class);
    }
}
