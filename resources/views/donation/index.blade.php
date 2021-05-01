@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Donation</li>
            </ol>
        </nav>
    </div>
</section>

<div class="container">
    @include('flash.messages')
</div>

<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="bold">Give a Life Changing Gift Today!</h4>
                <div class="mt-4 pr-3">
                    <h5 class="donate-font"> As one of our great leaders Nelson Mandela once said... "Education is the most powerful weapon which you can use to change the world."</h5><br />
                    <h5 class="donate-font">Sometimes this weapon "Education" could need sharpening in times of crisis such as Coronavirus (COVID-19), Limited Resources, Inequality among others.</h5><br />
                    <h5 class="donate-font">Well, your generous giving helps us normalize the distribution of quality education and also supporting the content creators on this platform who are based in Africa.</h5><br />
                    <h5 class="donate-font">Thank you!</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body p-5">
                        <nav class="pb-4">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="once-tab" data-toggle="tab" href="#once" role="tab" aria-controls="once" aria-selected="true">Once</a>
                                <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                                <a class="nav-link" id="cancel-tab" data-toggle="tab" href="#cancel" role="tab" aria-controls="cancel" aria-selected="false">Cancel</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="once" role="tabpanel" aria-labelledby="once-tab">
                                <form action="{{ route('donations.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="sponsor_name">Full Names</label>
                                        <input type="text" class="form-control" name="sponsor_name" value="{{ old('sponsor_name') }}">
                                        @error('sponsor_name')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="sponsor_email">Email Address</label>
                                        <input type="text" class="form-control" name="sponsor_email" value="{{ old('sponsor_email') }}" />
                                        @error('sponsor_email')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <a style="text-decoration: none;" id="sponsorSomeoneId" data-toggle="collapse" href="#sponsor" role="button" aria-expanded="false" aria-controls="sponsor">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <span class="pt-2">Sponsor Someone (Optional)</span>
                                                <i class="fa fa-plus-circle"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="sponsor">
                                        <div class="form-group">
                                            <label for="sponsee_name">Sponsee's Full Names</label>
                                            <input type="text" class="form-control" name="sponsee_name" value="{{ old('sponsee_name') }}" />
                                            @error('sponsee_name')
                                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="sponsee_email">Sponsee's Email Address</label>
                                            <input type="text" class="form-control" name="sponsee_email" value="{{ old('sponsee_email') }}" />
                                            <p class="author-font">* We will notify your Sponsee of your gift.</p>
                                            @error('sponsee_email')
                                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="body">Amount</label>
                                        <div class="input-group">
                                            <select class="custom-select currency" name="currency">
                                                <option selected>UGX</option>
                                                <option value="AED">AED</option>
                                                <option value="ARS">ARS</option>
                                                <option value="AUD">AUD</option>
                                                <option value="BGN">BGN</option>
                                                <option value="BRL">BRL</option>
                                                <option value="BWP">BWP</option>
                                                <option value="CAD">CAD</option>
                                                <option value="CFA">CFA</option>
                                                <option value="CHF">CHF</option>
                                                <option value="CNY">CNY</option>
                                                <option value="COP">COP</option>
                                                <option value="CRC">CRC</option>
                                                <option value="CZK">CZK</option>
                                                <option value="DKK">DKK</option>
                                                <option value="EUR">EUR</option>
                                                <option value="GBP">GBP</option>
                                                <option value="GHS">GHS</option>
                                                <option value="HKD">HKD</option>
                                                <option value="HUF">HUF</option>
                                                <option value="ILS">ILS</option>
                                                <option value="INR">INR</option>
                                                <option value="JPY">JPY</option>
                                                <option value="KES">KES</option>
                                                <option value="MAD">MAD</option>
                                                <option value="MOP">MOP</option>
                                                <option value="MUR">MUR</option>
                                                <option value="MXN">MXN</option>
                                                <option value="MYR">MYR</option>
                                                <option value="NGN">NGN</option>
                                                <option value="NOK">NOK</option>
                                                <option value="NZD">NZD</option>
                                                <option value="PEN">PEN</option>
                                                <option value="PHP">PHP</option>
                                                <option value="PLN">PLN</option>
                                                <option value="RUB">RUB</option>
                                                <option value="RWF">RWF</option>
                                                <option value="SAR">SAR</option>
                                                <option value="SEK">SEK</option>
                                                <option value="SGD">SGD</option>
                                                <option value="SLL">SLL</option>
                                                <option value="THB">THB</option>
                                                <option value="TRY">TRY</option>
                                                <option value="TWD">TWD</option>
                                                <option value="TZS">TZS</option>
                                                <option value="UGX">UGX</option>
                                                <option value="USD">USD</option>
                                                <option value="VEF">VEF</option>
                                                <option value="XAF">XAF</option>
                                                <option value="XOF">XOF</option>
                                                <option value="ZAR">ZAR</option>
                                                <option value="ZMK">ZMK</option>
                                                <option value="ZMW">ZMW</option>
                                                <option value="ZMD">ZMD</option>
                                            </select>
                                            <input type="number"  name="amount" value="{{ old('amount') }}" aria-label="First name" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @error('currency')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                        @error('amount')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="pt-4">
                                        <button id="round-button-2" type="submit" class="btn btn-danger btn-block">Give Once</button>
                                    </div>
                                    <p class="author-font mt-3">By donating, you agree to our <a href="#" style="text-decoration: none;">terms of service</a> and <a href="#" style="text-decoration: none;">privacy policy</a></p>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                <form action="{{ route('donations.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="sponsor_name">Full Names</label>
                                        <input type="text" class="form-control" name="sponsor_name" value="{{ old('sponsor_name') }}">
                                        @error('sponsor_name')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="sponsor_email">Email Address</label>
                                        <input type="text" class="form-control" name="sponsor_email" value="{{ old('sponsor_email') }}" />
                                        @error('sponsor_email')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="sponsor_email">Duration <span class="light_gray_color">(*Optional)</span></label>
                                        <input type="number" class="form-control" name="sponsor_email" value="{{ old('sponsor_email') }}" />
                                        @error('sponsor_email')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <a style="text-decoration: none;" id="sponsorSomeoneMonthlyId" data-toggle="collapse" href="#sponseeSection" role="button" aria-expanded="false" aria-controls="sponseeSection">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <span class="pt-2">Sponsor Someone (*Optional)</span>
                                                <i class="fa fa-plus-circle"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="sponseeSection">
                                        <div class="form-group">
                                            <label for="sponsee_name">Sponsee's Full Names</label>
                                            <input type="text" class="form-control" name="sponsee_name" value="{{ old('sponsee_name') }}" />
                                            @error('sponsee_name')
                                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="sponsee_email">Sponsee's Email Address</label>
                                            <input type="text" class="form-control" name="sponsee_email" value="{{ old('sponsee_email') }}" />
                                            <p class="author-font">* We will notify your Sponsee of your gift.</p>
                                            @error('sponsee_email')
                                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="body">Amount</label>
                                        <div class="input-group">
                                            <select class="custom-select currency" name="currency">
                                                <option selected>UGX</option>
                                                <option value="AED">AED</option>
                                                <option value="ARS">ARS</option>
                                                <option value="AUD">AUD</option>
                                                <option value="BGN">BGN</option>
                                                <option value="BRL">BRL</option>
                                                <option value="BWP">BWP</option>
                                                <option value="CAD">CAD</option>
                                                <option value="CFA">CFA</option>
                                                <option value="CHF">CHF</option>
                                                <option value="CNY">CNY</option>
                                                <option value="COP">COP</option>
                                                <option value="CRC">CRC</option>
                                                <option value="CZK">CZK</option>
                                                <option value="DKK">DKK</option>
                                                <option value="EUR">EUR</option>
                                                <option value="GBP">GBP</option>
                                                <option value="GHS">GHS</option>
                                                <option value="HKD">HKD</option>
                                                <option value="HUF">HUF</option>
                                                <option value="ILS">ILS</option>
                                                <option value="INR">INR</option>
                                                <option value="JPY">JPY</option>
                                                <option value="KES">KES</option>
                                                <option value="MAD">MAD</option>
                                                <option value="MOP">MOP</option>
                                                <option value="MUR">MUR</option>
                                                <option value="MXN">MXN</option>
                                                <option value="MYR">MYR</option>
                                                <option value="NGN">NGN</option>
                                                <option value="NOK">NOK</option>
                                                <option value="NZD">NZD</option>
                                                <option value="PEN">PEN</option>
                                                <option value="PHP">PHP</option>
                                                <option value="PLN">PLN</option>
                                                <option value="RUB">RUB</option>
                                                <option value="RWF">RWF</option>
                                                <option value="SAR">SAR</option>
                                                <option value="SEK">SEK</option>
                                                <option value="SGD">SGD</option>
                                                <option value="SLL">SLL</option>
                                                <option value="THB">THB</option>
                                                <option value="TRY">TRY</option>
                                                <option value="TWD">TWD</option>
                                                <option value="TZS">TZS</option>
                                                <option value="UGX">UGX</option>
                                                <option value="USD">USD</option>
                                                <option value="VEF">VEF</option>
                                                <option value="XAF">XAF</option>
                                                <option value="XOF">XOF</option>
                                                <option value="ZAR">ZAR</option>
                                                <option value="ZMK">ZMK</option>
                                                <option value="ZMW">ZMW</option>
                                                <option value="ZMD">ZMD</option>
                                            </select>
                                            <input type="number"  name="amount" value="{{ old('amount') }}" aria-label="First name" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @error('currency')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                        @error('amount')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input id="monthlyInterval" type="hidden" name="interval" value="">
                                    <div class="pt-4">
                                        <button id="round-button-2" type="submit" class="btn btn-danger btn-block">Give Monthly</button>
                                    </div>
                                    <p class="author-font mt-3">By donating, you agree to our <a href="#" style="text-decoration: none;">terms of service</a> and <a href="#" style="text-decoration: none;">privacy policy</a></p>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                                <form action="{{ route('donations.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <label for="sponsor_email">Email Address</label>
                                        <input type="text" class="form-control" name="sponsor_email" value="{{ old('sponsor_email') }}" />
                                        @error('sponsor_email')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="pt-4">
                                        <button id="round-button-2" type="submit" class="btn btn-danger btn-block">Cancel Donation</button>
                                    </div>
                                    <p class="author-font mt-3">By donating, you agree to our <a href="#" style="text-decoration: none;">terms of service</a> and <a href="#" style="text-decoration: none;">privacy policy</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/donate.js')}}" type="text/javascript"></script>
@endpush
