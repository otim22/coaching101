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
            <div class="col-lg-6 col-md-6 col-sm-12 ">
                <h4 class="bold">Give a Life Changing Gift Today!</h4>
                <div class="mt-4 pr-3 mb-5">
                    <h5 class="donate-font"> As one of our great leaders Nelson Mandela once said... "Education is the most powerful weapon which you can use to change the world."</h5><br />
                    <h5 class="donate-font">Sometimes this weapon "Education" needs sharpening in times of crisis as Covid-19 times when resources are  limited,  disruptions and a lot of inequality.</h5><br />
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
                                        <label for="name">Full Names</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input id="onceInterval" type="hidden" name="interval" value="daily">

                                    <input type="hidden" name="duration" value="1">

                                    <div class="form-group mt-4 mb-4">
                                        <label for="body">Amount</label>
                                        <div class="input-group">
                                            <select class="custom-select currency" name="currency">
                                                <option selected>USD</option>
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="number"  name="amount" value="{{ old('amount') }}" aria-label="First name" class="form-control">
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
                                        <label for="name">Full Names</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="duration">Duration of donation <span class="light_gray_color">(*Optional)</span></label>
                                        <input type="number" class="form-control" name="duration" value="{{ old('duration') }}" placeholder="Example: 1" />
                                        <span class="light_gray_color"><small>Example: If set to 5 with interval of monthly you would be charged 5 months, and the subscription stops.</small></span>
                                        @error('duration')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4 mb-4">
                                        <label for="body">Amount</label>
                                        <div class="input-group">
                                            <select class="custom-select currency" name="currency">
                                                <option selected>USD</option>
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="number"  name="amount" value="{{ old('amount') }}" aria-label="First name" class="form-control">
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
                                <form action="{{ route('donations.cancel') }}" method="POST">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
                                        @error('email')
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
    <script src="{{ asset('js/tab_selection.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/donate.js')}}" type="text/javascript"></script>
@endpush
