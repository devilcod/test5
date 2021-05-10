<?php

namespace App\Http\Livewire\Category;


use App\Models\Category;
use Livewire\Component;

class IndexCategory extends Component
{
    public function render()
    {
        return view('livewire.category.index-category',['categories' => Category::all()]);
    }
}
