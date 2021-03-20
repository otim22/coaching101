<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8">
        @if($cartItemTotal === 0)
            <h5 class="mb-3 bold">No item in your cart</h5>
        @elseif($cartItemTotal === 1)
            <h5 class="mb-3 bold">{{ $cartItemTotal }}  Subject in your cart</h5>
        @elseif($cartItemTotal > 1)
            <h5 class="mb-3 bold">{{ $cartItemTotal }} Subjects in your cart</h5>
        @endif

        @forelse($cartItems as $subject)
            <div class="card-custom p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                        <a href="#" style="text-decoration: none;">
                            <span class="bold">{{ $subject['title'] }}</span>
                        </a>
                    </div>
                    <div class="order-2">
                        <span class="red_color bold text-set">{{  rtrim(rtrim(number_format($subject['price'], 2), 2), '.') }}/-</span>
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
                <a type="button" href="{{ route('home') }}" class="btn btn-danger mb-4" id="round-button-2">
                    Keep shopping
                </a>
            </div>
        @endforelse

        <div class="pt-3">
            <div class="mb-3">
                <h5 class="bold">Recently wishlisted</h5>
            </div>
            @forelse($wishlistItems as $wishlistItem)
            <div class="card-custom p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                        <a href="#" style="text-decoration: none;">
                            <span class="bold">{{ $wishlistItem->subject->title }}</span> <br />
                        </a>
                    </div>
                    <div class="order-2">
                        <span class="red_color bold text-set"> {{  rtrim(rtrim(number_format($wishlistItem->subject->price, 2), 2), '.') }}/-</span>
                    </div>
                    <div class="d-flex pr-3 align-items-start flex-column">
                        <a type="button" wire:click="removeFromWishlist({{ $wishlistItem->id }})"><small>Remove</small></a>
                        <a type="button" wire:click="addToCart({{ $wishlistItem->subject->id }})"><small type="button" class="text-set">Add to Cart</small></a>
                    </div>
                </div>
            </div>
            @empty
                <div class="text-center mt-5 mb-5">
                    <p>No item(s) in wishlist</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
        <aside class="p-3 p-4 border rounded add-shadow">
            <div class="make-me-sticky">
                <h5>Total:</h5>
                <h4 class="bold">UGX {{  rtrim(rtrim(number_format($sum, 2), 2), '.') }}/-</h4>
                <hr />
                @if($cartItemTotal > 0)
                    <div class="mt-4">
                        <a id="round-button-2" type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-block mb-2 text-white">Checkout</a>
                    </div>
                @endif
            </div>
        </aside>
    </div>
    <!-- Modal -->
  <div wire:ignore class="modal fade" id="myModal" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Process Payment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            <strong>Error!</strong>&nbsp;<span id="error-message"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-success" role="alert" id="alert-success">
            <span id="success-body"></span>
        </div>
        <div class="card-js" id="my-card"></div>
        <div id="spinner">
            <div class="d-flex justify-content-center">
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Processing...</span>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <span>Processing...</span>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="process">Process</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>
@push('scripts')
    <script src="{{ asset('js/card-js.js') }}"></script>
    <script>
        document.addEventListener('livewire:load', function (event) {
            var spinner = $('#spinner')
            var alert = $('#alert')
            var myCard = $('#my-card');
            var proccessBtn = $('#process')
            var alertSuccess = $('#alert-success')
            spinner.attr("style","display:none !important");
            alert.attr("style","display:none !important");
            alertSuccess.attr("style","display:none !important");

            $("#process").click(function() {
                var cardNumber = myCard.CardJs('cardNumber');
                var expiryMonth = myCard.CardJs('expiryMonth');
                var expiryYear = myCard.CardJs('expiryYear');
                var cvc = myCard.CardJs('cvc');
                var valid = CardJs.isExpiryValid(expiryMonth, expiryYear);
                if (cardNumber === '') {
                    $('.card-number-wrapper').addClass('has-error')
                    return
                }
                if (expiryMonth === '') {
                    $('.expiry-wrapper').addClass('has-error')
                    return
                }
                if (expiryYear === '') {
                    $('.expiry-wrapper').addClass('has-error')
                    return
                }
                if (cvc === '') {
                    $('.cvc-wrapper').addClass('has-error')
                    return
                }
                if (!valid) {
                    $('.expiry-wrapper').addClass('has-error')
                    return
                }
                var cardDetails = {
                    'number': CardJs.numbersOnlyString(cardNumber),
                    'expiryMonth': expiryMonth,
                    'expiryYear': expiryYear,
                    'cvv': cvc
                }
                proccessBtn.attr('disabled', 'disabled')
                myCard.attr("style","display:none !important");
                spinner.removeAttr('style');
                @this.cardDetails = cardDetails
                @this.checkout()
            });

            var showSuccess = function() {
                spinner.attr("style","display:none !important");
                alertSuccess.removeAttr('style');
                proccessBtn.attr("style","display:none !important");
                $('#success-body').append('Transaction Successful')
            }

            @this.on('onSuccess', function (res) {
                console.log(res)
                if (res.hasOwnProperty('meta')) {
                    window.open(res.meta.authorization.redirect)
                }
                if (res.message.toLowerCase() === 'successful') {
                    showSuccess()
                }
            })
            @this.on('onError', function (res) {
                console.log(res)
                spinner.attr("style","display:none !important");
                myCard.removeAttr('style');
                alert.removeAttr('style');
                proccessBtn.removeAttr('disabled');
                $('#error-message').append(res.message)
            })
            var response = @this.response
            if (response !== null && Object.keys(response).length) {
                @this.clearCart()
            }
        })
    </script>
@endpush
