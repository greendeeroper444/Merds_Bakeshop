<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\WithPagination;
use Cart;
use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    use WithPagination;

    public $sort = 'default';
    public $selectedCategory = 'all';
    public $page = 1;

    protected $queryString = [
        'selectedCategory' => ['except' => 'all'],
        'page',
    ];

    public function mount()
    {
        $this->selectedCategory = request()->query('selectedCategory', 'all');
        $this->page = request()->query('page', 1);
    }


    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        // $this->emit('showToast', 'Product added to cart successfully.');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function addToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');

        // Show a toast message using SweetAlert
        $toastMessage = "'${product_name}' is added to your Cart.";
        $this->dispatchBrowserEvent('showToast', ['message' => $toastMessage]);
    }


    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage('commentsPage');
    }

    public function render()
    {

        $sort_order = 'id';
        switch ($this->sort) {
            case 'price-low-to-high':
                $sort_order = 'regular_price';
                break;
            case 'price-high-to-low':
                $sort_order = 'regular_price DESC';
                break;
            case 'name-a-to-z':
                $sort_order = 'name';
                break;
            case 'name-z-to-a':
                $sort_order = 'name DESC';
                break;
            default:
                break;
        }

        $query = Product::orderByRaw("BINARY $sort_order");

        if ($this->selectedCategory !== 'all') {
            $query->whereHas('category', function ($query) {
                $query->where('slug', $this->selectedCategory);
            });
        }

        $products = $query->paginate(6, ['*'], 'page', $this->page);

        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories,
        'categories' => Category::where('name', 'like', '%'.$this->search.'%')->paginate(6),  ['*'], 'commentsPage']);
    }
}
