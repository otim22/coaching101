<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 rounded mb-5">
            <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-card-tab" data-toggle="tab" href="#nav-card" role="tab" aria-controls="nav-card" aria-selected="true">Card</a>
                <a class="nav-link" id="nav-mobilemoney-tab" data-toggle="tab" href="#nav-mobilemoney" role="tab" aria-controls="nav-mobilemoney" aria-selected="false">Mobile Money</a>
            </div>
            <div wire:ignore class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-card" role="tabpanel" aria-labelledby="nav-card-tab">
                    <div class="bg-white add-shadow rounded p-5">
                        <p>Please, Provide Card Details (International)</p>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="display:none !important">
                            <strong>Error!</strong>&nbsp;<span id="error-message"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success" style="display:none !important">
                            <span id="success-body"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-js pt-3" id="my-card"></div>
                        <div class="secure-badge">
                            <a href="https://www.flutterwave.com" class="secure-badge__link" target="_blank" rel="external noreferrer noopener nofollow" aria-label="Flutterwave Website" style="text-decoration: none;">
                                <svg viewBox="0 0 8 9.6" height="9.6px" width="8px" class="secure-badge__icon" aria-hidden="true">
                                    <path d="M3.9932318000000038,0.7706122399999913 C5.211505900000002,0.7706122399999913 6.226734300000004,1.724081599999991 6.226734300000004,2.912653099999993 L6.226734300000004,3.7224489999999903 L1.7597293000000036,3.7224489999999903 L1.7597293000000036,2.912653099999993 C1.7597293000000036,1.7371428999999914 2.774957700000005,0.7706122399999913 3.9932318000000038,0.7706122399999913 L3.9932318000000038,0.7706122399999913ZM4.006768200000021,5.407346899999993 C4.426395900000021,5.407346899999993 4.7648054000000215,5.7338775999999925 4.7648054000000215,6.138775499999994 C4.7648054000000215,6.386938799999992 4.642978000000021,6.556734699999993 4.453468700000023,6.687346899999994 L4.670050800000023,7.902040799999995 L3.3434856000000224,7.902040799999995 L3.5600677000000225,6.700408199999991 C3.3705584000000215,6.5697958999999955 3.2487310000000207,6.373877599999993 3.2487310000000207,6.138775499999994 C3.2487310000000207,5.7338775999999925 3.5871404000000204,5.407346899999993 4.006768200000021,5.407346899999993 L4.006768200000021,5.407346899999993ZM3.9932318,0 C2.3282571999999995,0 0.9475465000000014,1.3061223999999996 0.9475465000000014,2.9126531 L0.9475465000000014,3.7224489999999975 L0.4602368999999982,3.7224489999999975 C0.18950929999999744,3.7224489999999975 0,4.048979599999999 0,4.3102041 L0,9.234285700000001 C0,9.495510199999998 0.18950929999999744,9.600000000000001 0.4602368999999982,9.600000000000001 L7.5803723000000005,9.600000000000001 C7.8510998,9.600000000000001 8,9.495510199999998 8,9.234285700000001 L8,4.3102041 C7.9864636,4.048979599999999 7.824027099999999,3.7224489999999975 7.566835900000001,3.7224489999999975 L7.038917100000003,3.7224489999999975 L7.038917100000003,2.9126531 C7.038917099999999,1.3061223999999996 5.658206400000001,0 3.9932318,0 L3.9932318,0Z" fill="#f5a623"></path>
                                </svg>
                                <span class="secure-badge__text">Secured by Flutterwave</span>
                            </a>
                        </div>
                        @include('partials.spinner')
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-mobilemoney" role="tabpanel" aria-labelledby="nav-mobilemoney-tab">
                    <div class="bg-white add-shadow rounded p-5">
                        <div class="mobilemoney-form">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Phone Number (Uganda)</label>
                                    <input type="number" class="form-control phone " id="phoneNumber" placeholder="256123456789">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Network</label>
                                    <select class="form-control network-select" id="network">
                                        <option value="airtel">Airtel</option>
                                        <option value="mtn">MTN</option>
                                    </select>
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        Please select valid network.
                                    </div>
                                </div>
                                <div class="secure-badge">
                                    <a href="https://www.flutterwave.com" class="secure-badge__link" target="_blank" rel="external noreferrer noopener nofollow" aria-label="Flutterwave Website" style="text-decoration: none;">
                                        <svg viewBox="0 0 8 9.6" height="9.6px" width="8px" class="secure-badge__icon" aria-hidden="true">
                                            <path d="M3.9932318000000038,0.7706122399999913 C5.211505900000002,0.7706122399999913 6.226734300000004,1.724081599999991 6.226734300000004,2.912653099999993 L6.226734300000004,3.7224489999999903 L1.7597293000000036,3.7224489999999903 L1.7597293000000036,2.912653099999993 C1.7597293000000036,1.7371428999999914 2.774957700000005,0.7706122399999913 3.9932318000000038,0.7706122399999913 L3.9932318000000038,0.7706122399999913ZM4.006768200000021,5.407346899999993 C4.426395900000021,5.407346899999993 4.7648054000000215,5.7338775999999925 4.7648054000000215,6.138775499999994 C4.7648054000000215,6.386938799999992 4.642978000000021,6.556734699999993 4.453468700000023,6.687346899999994 L4.670050800000023,7.902040799999995 L3.3434856000000224,7.902040799999995 L3.5600677000000225,6.700408199999991 C3.3705584000000215,6.5697958999999955 3.2487310000000207,6.373877599999993 3.2487310000000207,6.138775499999994 C3.2487310000000207,5.7338775999999925 3.5871404000000204,5.407346899999993 4.006768200000021,5.407346899999993 L4.006768200000021,5.407346899999993ZM3.9932318,0 C2.3282571999999995,0 0.9475465000000014,1.3061223999999996 0.9475465000000014,2.9126531 L0.9475465000000014,3.7224489999999975 L0.4602368999999982,3.7224489999999975 C0.18950929999999744,3.7224489999999975 0,4.048979599999999 0,4.3102041 L0,9.234285700000001 C0,9.495510199999998 0.18950929999999744,9.600000000000001 0.4602368999999982,9.600000000000001 L7.5803723000000005,9.600000000000001 C7.8510998,9.600000000000001 8,9.495510199999998 8,9.234285700000001 L8,4.3102041 C7.9864636,4.048979599999999 7.824027099999999,3.7224489999999975 7.566835900000001,3.7224489999999975 L7.038917100000003,3.7224489999999975 L7.038917100000003,2.9126531 C7.038917099999999,1.3061223999999996 5.658206400000001,0 3.9932318,0 L3.9932318,0Z" fill="#f5a623"></path>
                                        </svg>
                                        <span class="secure-badge__text">Secured by Flutterwave</span>
                                    </a>
                                </div>
                            </form>
                        </div>
                        @include('partials.spinner')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <aside class="p-4 border rounded bg-white add-shadow">
                <div class="make-me-sticky">
                    <h5 class="bold mb-3">Donation Summary</h5>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between">
                                <div>Amount:</div>
                                <div><span> {{ $donationDetails->format_amount }}/-</span></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Tax:</div>
                                <div><span> 0.00/-</span></div>
                            </div>
                            @if($donationDetails->interval)
                                <div class="d-flex justify-content-between">
                                    <div>Interval:</div>
                                    <div><span> monthly</span></div>
                                </div>
                            @endif
                        </li>
                    </ul>
                    <hr />
                    <div class="d-flex justify-content-between">
                        <div>Total:</div>
                        <div><span> {{ $donationDetails->currency }} {{ $donationDetails->format_amount }}/-</span></div>
                    </div>
                    @if($donationDetails->sponsee_email)
                        <div>
                            <h6 class="mt-4 bold">Sponsee Details</h6>
                            <div class="d-flex justify-content-between">
                                <div>Name:</div>
                                <div><span> {{ $donationDetails->sponsee_name }}</span></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Email:</div>
                                <div><span> {{ $donationDetails->sponsee_email }}</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="mt-5">
                        <a id="process"  type="button" class="btn btn-danger btn-block round-button mb-2">Complete Donation</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/donate.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/card-js.js') }}"></script>
    <script>
        function validateNetwork(network, number) {
            const networks = {
                airtel: ["70", "75"],
                mtn: ["77", "78"]
            }
            let startIndex = null
            let endIndex = null
            if (number.length === 10) {
                startIndex = 1
                endIndex = 3
            }
            if (number.length === 12) {
                startIndex = 3
                endIndex = 5
            }

            if (number.length === 13) {
                startIndex = 4
                endIndex = 6
            }
            if (startIndex !== null && endIndex !== null) {
                if (networks.hasOwnProperty(network)) {
                    const prefix = number.substring(startIndex, endIndex)
                    return networks[network].includes(prefix)
                }
                return false
            }
            return false
        }
        function validateMobile(mobilenumber) {
            var regxNotWithPrefix = '^[0-9]{10}$'
            var regxWithPrefix='^(/+[0-9]{1,3})?([0-9]{10})$'
            var regex = mobilenumber.startsWith('0') ? regxNotWithPrefix : regxWithPrefix
            return new RegExp(regex).test(mobilenumber)
        }
        document.addEventListener('livewire:load', function (event) {
            var spinner = $('.tab-pane').find('#spinner')
            var alert = $('#alert')
            var myCard = $('#my-card');
            var proccessBtn = $('#process')
            var alertSuccess = $('#alert-success')

            spinner.attr("style","display:none !important");

            function processCardPayment () {
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
                myCard.attr("style","display: none !important");
                spinner.removeAttr('style');

                @this.cardDetails = cardDetails
                @this.checkout()
            }

            $("#process").click(function() {
                if ($('.nav-link').hasClass('active')) {
                    var tab = $('.nav-link.active').attr('id')
                    if (tab === 'nav-card-tab') {
                        processCardPayment()
                        return
                    }
                    if (tab === 'nav-mobilemoney-tab') {
                        var phoneNumber = $('#phoneNumber').val()
                        var network = $('#network').val()
                        var isPhoneNumberValid = validateMobile(phoneNumber)
                        if (!isPhoneNumberValid) {
                            $('.phone').addClass('is-invalid')
                            return
                        }
                        var isValidNetwork = validateNetwork(network, phoneNumber)
                        if (!isValidNetwork) {
                            $('.network-select').addClass('is-invalid')
                            return
                        }
                        var data = { 'network': network, 'phoneNumber': phoneNumber }
                        proccessBtn.attr('disabled', 'disabled')
                        $('.mobilemoney-form').attr("style","display:none !important");
                        $('.nav-link:first-child').addClass('disabled')
                        spinner.removeAttr('style');
                        @this.proccessMobileMoney(data)
                        return
                    }
                }
            });

            if ($('.nav-link').hasClass('active')) {
                var tab = $('.nav-link.active').attr('id')
                if (tab === 'nav-mobilemoney-tab') {
                    $('.mobilemoney-form').removeAttr("style");
                    $('.nav-link:first-child').removeClass('disabled')
                    spinner.attr("style","display:none !important")
                    proccessBtn.removeAttr('disabled')
                }
            }

            $('.phone').keyup(function() {
                if($(this).hasClass('is-invalid')) {
                    $(this).removeClass('is-invalid')
                }
            })

            $('.network-select').change(function() {
                if($(this).hasClass('is-invalid')) {
                    $(this).removeClass('is-invalid')
                }
            })

            var showSuccess = function() {
                spinner.attr("style","display:none !important");
                alertSuccess.removeAttr('style');
                $('#success-body').append('Transaction Successful')
            }

            @this.on('onSuccess', function (res) {
                if (res.hasOwnProperty('meta')) {
                    window.open(res.meta.authorization.redirect)
                }
                if (res.message.toLowerCase() === 'successful') {
                    console.log(res);
                }
                showSuccess()
            })

            @this.on('onError', function (res) {
                spinner.attr("style","display:none !important");
                myCard.removeAttr('style');
                alert.removeAttr('style');
                proccessBtn.removeAttr('disabled');
                $('#error-message').append(res.message);
            })

            var response = @this.response
            if (response !== null && Object.keys(response).length) {
                console.log(response);
            }
        })
    </script>
@endpush
