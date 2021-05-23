<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $listeners = [
        'productsUpdated' => 'refreshProductsPage'];

    public function refreshProductsPage()
    {
        $products = Product::latest()->paginate(12);
    }


    public function render()
    {
        $products = Product::latest()->paginate(12);
        return view('livewire.product.index-product', compact('products'));
    }

}
