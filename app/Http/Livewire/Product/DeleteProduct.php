<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;

class DeleteProduct extends ModalComponent
{
    public $productId;
    public $photo;

    public function mount(Product $product)
    {
        $this->productId = $product; 
        $this->photo = $product->photo;
    }
    public function deleteProduct()
    {
        if($this->productId)
        {
            if(Storage::exists("public/$this->photo"))
            {
                $this->productId->delete();
                Storage::delete("public/$this->photo");
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
        }
    }

    public function render()
    {
        return view('livewire.product.delete-product');
    }
}
