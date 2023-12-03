<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        $bsproducts = Product::orderBy('created_at', 'DESC')->take(10)->get();
        return view('livewire.home-component', ['bsproducts' => $bsproducts]);
    }
}
