<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];

    // public function categories() {
    //     return $this->hasMany(Category::class);
    // }


    public function childrenCategories() {
        return $this->belongsTo(Category::class);
    }
    
    public function parentCategory() {
        return $this->hasMany(Category::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
