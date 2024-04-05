<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\OrderServices;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function subData()
    {
        return $this->hasMany(OrderServices::class,'order_id');
    }

   
}
