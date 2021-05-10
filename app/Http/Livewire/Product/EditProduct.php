<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class EditProduct extends Component
{

    public $product;
    public $productId;
    public $name;
    public $description;
    public $category_id;
    public $price;
    public $photo;
    

    public function mount(product $product)
    {
        if($product) {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->category_id = $product->category->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->photo = $product->photo;
        }
    }

    public function updateProduct()
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
            $product->update([
                'name' => $this->name,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'price' => $this->price,
                'photo' => $this->photo,
            ]);
            session()->flash('message', 'Product Updated Successfully.');
        }
        return redirect()->route("products");
    }

    public function render()
    {
        return view('livewire.product.edit-product',['categories' => Category::all()]);
    }
}
