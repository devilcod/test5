<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class DeleteProduct extends ModalComponent
{
    public $productId;

    public function mount(Product $product)
    {
        $this->productId = $product; 
    }
    public function deleteProduct()
    {
        $this->productId->delete();
        $this->closeModalWithEvents(['productsUpdated',
        IndexProduct::getName() => 'productsUpdated',]);
        $this->alert('success', 'Deleted!', [
            'position' =>  'top-end', 
            'timer' =>  '4000', 
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
      ]);
    }

    public function render()
    {
        return view('livewire.product.delete-product');
    }
}
