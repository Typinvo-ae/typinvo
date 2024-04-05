<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Modules\Category\Entities\Category;

class cartItems extends Model
{
    protected $table = 'cart_items';
    protected $guarded = [];
  
    public function Service()
    {
        return $this->belongsTo(Category::class);
    }
}
