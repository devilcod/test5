<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name','amount_product','total_price',];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
