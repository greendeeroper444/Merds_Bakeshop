<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Livewire\Component;

class AdminCategoriesComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function addCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();

        $message = 'Category has been created successfully.';
        session()->flash('success_message', $message);

        $this->reset(['name', 'slug']);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('category-saved', ['message' => $message]);
    }

    public function refreshComponent()
    {
        // Empty method, used for refreshing the component
    }


    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        DB::statement("ALTER TABLE categories AUTO_INCREMENT = 1");
        session()->flash('success_message', 'Category has been deleted successfully.');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-categories-component', ['categories' => $categories])->layout('layouts.admin');
    }
}
