<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class EditProduct extends Component
{

    public Product $product;

    public function mount(Product $product)
    {
        $this->product = '$product';
    }

    public function render()
    {
        return view('livewire.product.edit-product');
    }
}
