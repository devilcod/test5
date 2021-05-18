<?php

namespace App\Http\Livewire\Product;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;

class EditProduct extends ModalComponent
{
    use WithFileUploads;

    public $product;
    public $productId;
    public $name;
    public $description;
    public $category_id;
    public $currentCategory;
    public $price;
    public $photo;
    public $currentPhoto;
    public $listeners = ['categoriesUpdated' => 'refreshCategory'];


    public function mount(product $product)
    {
        if($product) {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->currentPhoto = $product->photo;
        }
    }
    public function refreshCategory()
    {
        $categories = Category::latest()->get();
    }

    public function editProduct()
    {
        $validatedProductUpdateData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'photo' => 'nullable',
        ]);
        if($this->productId)
        {
            $product = Product::findOrFail($this->productId);
            Storage::delete("public/$this->currentPhoto");
            $photoName = $this->photo->store('photos','public');
            $validatedProductData['photo'] = $photoName;
            $product->update([
                'name' => $this->name,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'price' => $this->price,
                'photo' => $photoName,
            ]);
            $this->closeModalWithEvents(['productsUpdated',
            IndexProduct::getName() => 'productsUpdated']);
            $this->alert('success', 'Updated!', [
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

    public function render()
    {
        $categories = Category::latest()->get();
        return view('livewire.product.edit-product',compact('categories'));
    }
}
