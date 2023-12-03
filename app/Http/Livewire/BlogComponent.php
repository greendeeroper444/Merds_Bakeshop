<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        $bproducts = Product::orderBy('updated_at', 'DESC')->get();
        return view('livewire.blog-component', ['bproducts' => $bproducts]);
    }
}
