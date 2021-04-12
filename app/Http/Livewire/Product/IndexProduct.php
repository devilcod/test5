<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;
    //public $product;


    public function render()
    {
        $products = Product::latest()->paginate(3);
        return view('livewire.product.index-product', compact('products'));
    }

    // public function editProduct($id){


    // }

    public function deleteProduct($id){
        $productId = Product::findorfail($id);
        $productId->delete();
        session()->flash('message', 'Product successfully deleted.');
    }
}
