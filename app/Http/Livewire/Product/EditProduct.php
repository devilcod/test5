<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class EditProduct extends Component
{

    // public $name;
    // public $description;
    // public $category_id;
    // public $price;
    // public $photo;
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        // $this->description = $product->description;
        // $this->price = $product->price;
        // $this->photo = $product->photo;
    }

    public function render()
    {
        return view('livewire.product.edit-product');
    }
}
