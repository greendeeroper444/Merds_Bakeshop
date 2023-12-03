<a href="/cart" title="Cart" class="fas fa-shopping-cart">
    @if(Cart::instance('cart')->count() > 0)
        <span class="index">{{Cart::instance('cart')->count()}}</span>
    @endif
</a>
