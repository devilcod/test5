<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class EditCategory extends ModalComponent
{
    public $name;
    public $category_id;
    public $categoryId;
    public $category;

    protected $rules = [
        'name' => 'required',
        'category_id' => 'nullable',
        ];

    public function mount(Category $category)
    {
        if($category) {
            $this->categoryId = $category->id;
            $this->name = $category->name;
            $this->category_id = $category->category_id;
        }
    }

    function editCategory()
    {
        $validatedData = $this->validate();
        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
        ]);
        $this->closeModalWithEvents(['categoriesUpdated',
        IndexCategory::getName() => 'categoriesUpdated']);
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

    public function render()
    {
        $categories = Category::whereNull('category_id')
        ->with('childrenCategories')
        ->get();
        return view('livewire.category.edit-category', compact('categories'));
    }
}
