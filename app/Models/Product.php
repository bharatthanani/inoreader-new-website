<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function likes()
    {
        return $this->hasMany(Like::class,'product_id')->where('user_id',auth()->user()->id??null);
    }
}


