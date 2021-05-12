<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class DeleteCategory extends ModalComponent
{
    public $categoryId;

    public function mount(Category $category)
    {
        $this->categoryId = $category; 
    }

    public function deleteCategory()
    {
        $this->categoryId->delete();
        $this->closeModalWithEvents(['categoriesUpdated',
        IndexCategory::getName() => 'categoriesUpdated',]);
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
        return view('livewire.category.delete-category');
    }
}
