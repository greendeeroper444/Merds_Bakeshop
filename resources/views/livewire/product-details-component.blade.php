@section('title', 'Product Details')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Product Details</span></li>
        </ul>
    </div>
    <section class="product-details">
        <div class="product-image">
            <img src="{{ asset('assets/img/stocks') }}/{{ $product->image }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <div class="rating">
                <span class="rating-value">4.5</span>
                <div class="rating-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="rating-count">28 Reviews</span>
            </div>
            <button wire:click.prevent="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" class="add-to-cart-btn">Add to Cart</button>
        </div>
    </section>

    <section class="comment-section">
        <h2>Customer Reviews</h2>
        <div class="comment-item">
            <div class="comment-header">
                <span class="comment-author">Greendee Roper Panogalon</span>
                <span class="comment-date">June 12, 2023</span>
            </div>
            <div class="comment-content">
                <p>Great product! I love the taste and quality. Highly recommended!</p>
            </div>
        </div>

        <div class="comment-item">
            <div class="comment-header">
                <span class="comment-author">Meriam Apatan Cerna</span>
                <span class="comment-date">June 10, 2023</span>
            </div>
            <div class="comment-content">
                <p>Delicious! This is my favorite treat. Will definitely order again!</p>
            </div>
        </div>

        <!-- Add more comment items as needed -->

        <form class="comment-form">
            {{-- <h3>Add Your Review</h3> --}}
            {{-- <input type="text" placeholder="Name" required> --}}
            <textarea placeholder="Your review" required></textarea>
            <button class="submit-btn">Submit</button>
            <button onclick="window.location.href='/shop'" class="shop-continue-btn">Continue to shopping</button>
        </form>
    </section>
</main>
