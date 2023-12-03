<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;

class ProductDetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function addToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        return view('livewire.product-details-component', ['product' => $product])->layout('layouts.details');
    }
}
