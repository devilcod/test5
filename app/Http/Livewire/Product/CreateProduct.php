<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class CreateProduct extends Component
{
    public $name;
    public $description;
    public $category_id;
    public $price;
    public $photo;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'photo' => 'nullable',
    ];

    public function render()
    {
        $categories = Category::all();

        return view('livewire.product.create-product', compact('categories'));
    }


    public function createProduct(){
        $validatedProductData = $this->validate();

        Product::create($validatedProductData);
        session()->flash('message', 'Product successfully created.');
        return redirect()->route('products');
    }
}
