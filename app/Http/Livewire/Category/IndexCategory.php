<?php

namespace App\Http\Livewire\Category;


use App\Models\Category;
use Livewire\Component;

class IndexCategory extends Component
{
    public $listeners = ['categoriesUpdated' => 'refreshPage'];

    public function refreshPage()
    {
        $categories = Category::latest()->orderBy('updated_at')->paginate(8);
    }

    public function render()
    {
        $categories = Category::orderBy('category_id')->paginate(8);
        return view('livewire.category.index-category',compact('categories'));
    }
}
