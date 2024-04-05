<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartItems;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];

    public function cartItems()
    {
        return $this->hasMany(cartItems::class,'cart_id');
    }

}
