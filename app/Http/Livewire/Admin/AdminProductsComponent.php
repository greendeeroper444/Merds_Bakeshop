<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;

class AdminProductsComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $SKU;
    public $stock_status;
    // public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status ?? 'instock';
        // $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('stocks', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('success_message', 'Product has been created successfully.');
        $this->reset([
            'name',
            'slug',
            'description',
            'regular_price',
            'SKU',
            'stock_status',
            'quantity',
            'image',
            'category_id'
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1");
        session()->flash('success_message', 'Product has been deleted successfully.');
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('livewire.admin.admin-products-component', [
            'products' => $products, 'categories'=>$categories
            ])->layout('layouts.admin');
    }
}
