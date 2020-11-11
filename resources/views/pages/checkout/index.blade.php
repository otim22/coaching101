@extends('layouts.app')

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <h5 class="bold">Checkout</h5>
                <p>Use Credit Card</p>
                <div class="border mr-4 p-4 rounded bg-gray-3 mb-5">
                    <div class="form-group">
                        <label for="name">Name On Card</label>
                        <input type="text" class="form-control" id="name" placeholder="Name on card" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="number">Card Number</label>
                        <input type="text" class="form-control" id="number" placeholder="Card number">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="expiry_date">Expiry Date</label>
                                <input type="text" class="form-control" id="expiry_date" placeholder="MM / YY">
                            </div>
                            <div class="col">
                                <label for="security_code">Security Code</label>
                                <input type="text" class="form-control" id="security_code" placeholder="Security code">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end text-muted">
                        <div class="d-flex justify-content-between" style="color: #cacbcc;">
                            <div class="text-muted mr-1" style="margin: auto;">
                                <svg width="2.2em" height="2.2em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="#cacbcc" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                                    <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                                </svg>
                            </div>
                            <div>
                                <small>
                                    Secure <br/>
                                    Connection
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="mobile-money-qr-payment"
                            data-api-user-id="b12d7b22-3057-4c8e-ad50-63904171d18c"
                            data-amount="100"
                            data-currency="UGX"
                    >
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="bold">Order Details</h5>
                    <ul>
                        <li>
                            <p>Get ready to learn a lot of things.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                <aside class="p-3 p-4 border rounded bg-white add-shadow">
                    <div class="make-me-sticky">
                        <h5 class="bold">Summary</h5>
                        <ul>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>Original Price:</div>
                                    <div><span> UGX 100,000/-</span></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Tax:</div>
                                    <div><span> UGX 10,000/-</span>
                            </li>
                        </ul>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <div>Total:</div>
                            <div><span> UGX 110,000/-</span></div>
                        </div>
                        <div class="mt-4">
                            <a id="round-button-2" class="btn btn-danger btn-block mb-2" href="#">Complete payment</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection
