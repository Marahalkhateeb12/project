<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_name',
      'user_email',
      'password',
      'user_image',
      'user_address',
      'user_mobile',
  ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
