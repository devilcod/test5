<?php

namespace App\Http\Livewire\Product;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;

class CreateProduct extends ModalComponent
{
    use WithFileUploads;

    public $name;
    public $description;
    public $category_id;
    public $price;
    public $photo;
    public $listeners = ['categoriesUpdated' => 'refreshCategory'];


    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'photo' => 'nullable|image',
    ];

    public function refreshCategory()
    {
        $categories = Category::latest()->get();
    }

    public function render()
    {
        $categories = Category::whereNotNull('category_id')
        ->latest()
        ->get();

        return view('livewire.product.create-product', compact('categories'));
    }


    public function createProduct(){
        $validatedProductData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image',
        ]);
        if($this->photo)
        {
            $photoName = $this->photo->store('photos','public');
            $validatedProductData['photo'] = $photoName; 
        }
            if($validatedProductData)
            {
                Product::create($validatedProductData);
                $this->closeModalWithEvents(['productsUpdated',
                IndexProduct::getName() => 'productsUpdated']);
                $this->alert('success', 'Created!', [
                    'position' =>  'top-end', 
                    'timer' =>  '4000', 
                    'toast' =>  true, 
                    'text' =>  '', 
                    'confirmButtonText' =>  'Ok', 
                    'cancelButtonText' =>  'Cancel', 
                    'showCancelButton' =>  false, 
                    'showConfirmButton' =>  false, 
                ]);
            }else
            {
                $this->alert('error', 'Error!', [
                    'position' =>  'top-end', 
                    'timer' =>  '4000', 
                    'toast' =>  true, 
                    'text' =>  'Something Went Wrong!!!', 
                    'confirmButtonText' =>  'Ok', 
                    'cancelButtonText' =>  'Cancel', 
                    'showCancelButton' =>  false, 
                    'showConfirmButton' =>  false, 
                ]);   
            }
    }
}
