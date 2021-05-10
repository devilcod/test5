<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateCategory extends ModalComponent
{
    public $name;
    public $category_id = 2;

    protected $rules = [
    'name' => 'required',
    'category_id' => 'nullable',
    ];

    public function createCategory()
    {
        $validatedData = $this->validate();
        Category::create($validatedData);
        $this->closeModdal();
    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
}
