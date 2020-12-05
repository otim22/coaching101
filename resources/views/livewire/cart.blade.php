<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8">
        @if($cartItemTotal === 0)
            <h5 class="mb-3">No Subject in your cart</h5>
        @elseif($cartItemTotal === 1)
            <h5 class="mb-3">{{ $cartItemTotal }}  Subject in your cart</h5>
        @elseif($cartItemTotal > 1)
            <h5 class="mb-3">{{ $cartItemTotal }} Subjects in your cart</h5>
        @endif

        @forelse($cartItems as $subject)
            <div class="card-custom p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                        <a href="#" style="text-decoration: none;">
                            <span class="bold">{{ $subject['title'] }}</span> <br />
                        </a>
                    </div>
                    <div class="order-2">
                        <span class="red_color bold text-set">{{ $subject['price'] }}/-</span>
                    </div>
                    <div class="d-flex pr-3 align-items-start flex-column">
                        <a type="button" wire:click="removeFromCart({{ $subject['id'] }})"><small>Remove</small></a>
                        <a type="button" wire:click="addToWishlist({{ $subject['id'] }})"><small class="text-set">Add to Wishlist</small></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center mt-5 mb-5">
                <p>Your cart is empty. Keep shopping to find a course!</p>
                <a type="button" href="{{ url('/') }}" class="btn btn-danger mb-4" id="round-button-2">
                    Keep shopping
                </a>
            </div>
        @endforelse
        <div class="pt-3">
            <div class="mb-3">
                <h5>Recently wishlisted</h5>
            </div>
            @foreach($wishlistItems as $wishlistItem)
            <div class="card-custom p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                        <a href="#" style="text-decoration: none;">
                            <span class="bold">{{ $wishlistItem->subject->title }}</span> <br />
                        </a>
                    </div>
                    <div class="order-2">
                        <span class="red_color bold text-set">{{ $wishlistItem->subject->price }}/-</span>
                    </div>
                    <div class="d-flex pr-3 align-items-start flex-column">
                        <a type="button" wire:click="removeFromWishlist({{ $wishlistItem->id }})"><small>Remove</small></a>
                        <a type="button" wire:click="addToCart({{ $wishlistItem->subject->id }})"><small type="button" class="text-set">Add to Cart</small></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
        <aside class="p-3 p-4 border rounded add-shadow">
            <div class="make-me-sticky">
                <h5>Total:</h5>
                <h4 class="bold"> UGX {{ $sum }}/-</h4>
                <hr />
                <div class="mt-4">
                    <a id="round-button-2" wire:click="checkout()" class="btn btn-danger btn-block mb-2" href="{{ route('checkout.index') }}">Checkout</a>
                </div>
            </div>
        </aside>
    </div>
</div>
