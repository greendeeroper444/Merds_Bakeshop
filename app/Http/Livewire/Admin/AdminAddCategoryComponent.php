<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.admin');
    }
}
