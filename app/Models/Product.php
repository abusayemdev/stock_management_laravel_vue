<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','brand_id','product_name','sku','image','cost_price','retail_price','year','description','status'];

    //cons

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    //method

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductSizeStock::class);
    }

    

    

}
