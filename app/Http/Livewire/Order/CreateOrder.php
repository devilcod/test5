<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;

class CreateOrder extends Component
{
    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.order.create-order', compact('products'));
    }
    public function addToCart($productId)
    {
     $order = Order::where('product_id', $productId)->first();
     if(!$order){
        Order::updateOrCreate()
     }   
    }
}
