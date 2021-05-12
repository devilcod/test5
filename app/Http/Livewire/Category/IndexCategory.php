<?php

namespace App\Http\Livewire\Category;


use App\Models\Category;
use Livewire\Component;

class IndexCategory extends Component
{
    public $listeners = ['categoriesUpdated' => 'refreshPage'];

    public function refreshPage()
    {
        $categories = Category::latest()->orderBy('updated_at')->paginate(3);
    }

    public function render()
    {
        $categories = Category::latest()->orderBy('updated_at')->paginate(3);
        return view('livewire.category.index-category', ['categories' => $categories]);
    }
}
