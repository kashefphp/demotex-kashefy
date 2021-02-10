<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable= ['parent_id','name','detail','photo','slug'];



    public function details()
    {
        return $this->morphMany(Detail::class, 'detailable');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
