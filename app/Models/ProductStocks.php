<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStocks extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','size_id','quantity','date','status'];


    public const STOCK_IN = 'in';
    public const STOCK_OUT = 'out';

    //ralation
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
