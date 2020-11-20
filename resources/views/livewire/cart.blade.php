<div>
    @forelse($cartItems as $subject)
        <div class="card-custom p-3 mb-3">
            <div class="d-flex justify-content-between">
                <div class="flex-grow-1">
                    <a href="#" style="text-decoration: none;">
                        <span class="bold">{{ $subject['title'] }}</span> <br />
                    </a>
                </div>
                <div class="order-2">
                    <span class="red_color bold text-set">100, 000/-</span>
                </div>
                <div class="d-flex pr-3 align-items-start flex-column">
                    <a type="button" wire:click="removeFromCart({{ $subject['id'] }})"><small>Remove</small></a>
                    <small type="button" class="text-set">Add to Wishlist</small>
                </div>
            </div>
        </div>
    @empty
        <div>
            <p>Cart is empty</p>
        </div>
    @endforelse
    <div>
        <h5>Recently wishlisted</h5>
    </div>
</div>
