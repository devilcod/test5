<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Product\CreateProduct;
use App\Http\Livewire\Product\EditProduct;

class CreateCategory extends ModalComponent
{
    public $name;
    public $category_id;

    protected $rules = [
    'name' => 'required',
    'category_id' => 'nullable',
    ];

    public function createCategory()
    {
        $validatedData = $this->validate();
        Category::create($validatedData);
        $this->closeModalWithEvents(['categoriesUpdated',
        IndexCategory::getName() => 'categoriesUpdated',
        CreateProduct::getName() => 'categoriesUpdated',
        EditProduct::getName() => 'categoriesUpdated']);
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
    }

    public function render()
    {
        $categories = Category::whereNull('category_id')
        ->get();
        return view('livewire.category.create-category',compact('categories'));
    }
}
