<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['amount', 'detail_price', 'discount_detail_price'];
    protected $fillable = ['category_id', 'name', 'details', 'photos', 'price', 'discount', 'slug'];


    public function detailss()
    {
        return $this->morphMany(Detail::class, 'detailable');
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getAmountAttribute()
    {
        return $this->attributes['price'] - (($this->attributes['price'] * $this->attributes['discount']) / 100);
    }


//get all price from details of categoriess and products
    public function getDetailsPrice()
    {
        $detail_price = 0;
        //        get price of product details
        foreach ($this->detailss as $a) {
            $detail_price += $a->price;
        }

//        get price of own category details
        foreach ($this->category->details as $a) {
            $detail_price += $a->price;
        }

        return $detail_price;
    }


//discount for details price
    public function getDiscountDetailPriceAttribute()
    {
        $detail_price = $this->getDetailsPrice();

        if ($detail_price == 0) {
            return 'جزییات ندارد';
        }
        $total_price = $this->attributes['price'] + $detail_price;
        return $total_price - ((($total_price) * $this->attributes['discount']) / 100);
    }


//    get prices of all details
    public function getDetailPriceAttribute()
    {

        $detail_price = $this->getDetailsPrice();

        if ($detail_price == 0) {
            return 'جزییات ندارد';
        }
        $total_price = $this->attributes['price'] + $detail_price;
        return $total_price;

    }


}
