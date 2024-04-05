<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;


class PaymentType extends Model
{
    protected $fillable = ['name','user_id'];
}
