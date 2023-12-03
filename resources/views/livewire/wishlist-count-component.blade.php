<a href="#" title="Wishlist" class="fas fa-heart">
    @if(Cart::instance('wishlist')->count() > 0)
        <span class="index">{{Cart::instance('wishlist')->count()}}</span>
    @endif
</a>
