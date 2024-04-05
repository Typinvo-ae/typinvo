<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Entities\MainCategory;

class Category extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeMain($query)
    {
        return $query->where('is_active', 1)->whereNull('category_id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class,'category_id');
    }
   
}
