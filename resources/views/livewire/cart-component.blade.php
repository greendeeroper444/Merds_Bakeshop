@section('title', 'Cart')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Cart</span></li>
        </ul>
    </div>
    <section class="cart">
        @if(Cart::instance('cart')->count() > 0)
            <h1>Your Shopping Cart</h1>
            <div class="cart-container">
                @if(Session::has('success_message'))
                    <div class="alert alert-success-merds">
                        Success | {{ Session::get('success_message') }}
                    </div>
                @endif
                <table class="cart-items">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>
                            <button type="button" class="remove-button" wire:click.prevent="removeAll()" >Remove All</button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Cart::instance('cart')->count() > 0)
                        @foreach (Cart::instance('cart')->content() as $item)
                        <tr class="cart-item">
                            <td>
                                <img class="product-image" src="{{ asset('assets/img/stocks') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
                            <div class="product-details">
                                <h2>{{ $item->model->name }}</h2>
                            </div>
                            </td>
                            <td class="price">₱{{ $item->model->regular_price }}</td>
                            <td class="quantity">
                            <button class="decrement-button" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')" >-</button>
                            <span class="quantity-value">{{ $item->qty }}</span>
                            <button class="increment-button" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</button>
                            </td>
                            <td>
                            <button class="remove-button" wire:click.prevent="destroy('{{ $item->rowId }}')" ><span class="fas fa-trash"></span> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    @else
                            <p class="no-item-in-cart">No item in cart</p>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <p class="subtotal">Subtotal: ₱{{ Cart::subtotal() }}</p>
                <p class="taxes">Taxes: ₱{{Cart::tax() }}</p>
                <p class="total">Total: ₱{{ Cart::total() }}</p>
                <button class="checkout-button">Proceed to Checkout</button>
            </div>

        @else
            <div class="cart-empty-container">
                <h1 class="cart-empty-title">Your cart is empty!</h1>
                <p class="cart-empty-message">Add items to your cart to proceed</p>
                <a href="/shop" class="btn btn-primary">Shop Now!</a>
            </div>
        @endif
    </section>
</main>
