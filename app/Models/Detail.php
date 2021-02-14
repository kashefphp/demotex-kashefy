<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $appends = ['type'];

    protected $fillable = ['value', 'key', 'price', 'detailable_id', 'detailable_type'];

    public function detailable()
    {
        return $this->morphTo();
    }

    public function details()
    {
        return $this->belongsTo(DetailName::class, 'key_id', 'id');
    }

    /**
     * @return string
     */
    public function getTypeAttribute(): string
    {
        if ($this->detailable_type == 'App\Models\Product') {
            return 'محصول';
        }elseif ($this->detailable_type == 'App\Models\ProductCategory'){
            return 'دسته بندی';
        }
    }
}
