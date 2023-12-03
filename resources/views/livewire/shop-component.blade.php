@section('title', 'Shop')

<main class="main-container">
    <div id="toastContainer" class="toast-container" wire:ignore></div>
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Shop</span></li>
        </ul>
    </div>
    <section class="shop">
        <div class="welcome-shop">
            <h1>Welcome to Merds Bakeshop</h1>
            <p>Explore our delicious selection of baked goods.</p>
        </div>

        <div class="filter-container">
            <select class="category-select" wire:model="selectedCategory">
                <option value="all">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select class="sort-select" wire:model="sort">
                <option value="default">Default Sorting</option>
                <option value="price-low-to-high">Price: Low to High</option>
                <option value="price-high-to-low">Price: High to Low</option>
                <option value="name-a-to-z">Name: A to Z</option>
                <option value="name-z-to-a">Name: Z to A</option>
            </select>
        </div>

        @php
          $witems = Cart::instance('wishlist')->content()->pluck('id');
        @endphp
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-item">
                    <div class="container-image">
                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                            <img src="{{ asset('assets/img/stocks') }}/{{ $product->image }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <span class="price">₱{{ $product->regular_price }}</span>
                    <button wire:click.prevent="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" class="shop-button" onclick="showToastMessage('{{$product->name}}')">Add to Cart</button>
                    @if($witems->contains($product->id))
                            <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})" class="wishlisted" aria-label="Remove from wishlist"><i class="fas fa-heart"></i></a>
                        @else
                            <a href="#" wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" class="wishlist-btn" aria-label="Add to wishlist"><i class="fas fa-heart"></i></a>
                    @endif
                </div>
            @endforeach
            @if($products->isEmpty())
                <div class="no-products">No more, click previous</div>
            @endif
        </div>
    </section>
    <div class="pagination">
        {{ $products->links() }}
    </div>
</main>
@push('scripts')
    <script>
        function showToastMessage(productName){
        const toastContainer = $('#toastContainer');
        const toastMessage = $('<div>').addClass('toast-message').text(`${productName} is added to your Cart.`);
        toastMessage.html(toastMessage.html().replace(productName, '<strong>' + productName + '</strong>'));

        if(toastContainer.children('.toast-message').length >= 1) {
            toastContainer.children('.toast-message').first().remove();
        }

        toastContainer.append(toastMessage);

        Livewire.emit('showToast');
        setTimeout(() => toastMessage.remove(), 5000);
        }
    </script>
@endpush
