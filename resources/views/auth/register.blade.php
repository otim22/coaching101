@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-8 col-sm-12 pt-4">
                <div class="card auth-card">
                    <div class="card-header" id="grayBg">
                        <div class="pt-3 mb-3 text-center">
                            <div class="mb-3">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                </svg>
                            </div>
                            <h5 class="bold">{{ __('Register and Enjoy learning') }}</h5>
                            <p class="text-muted">Create your account. It's free and only takes a minute.</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row ml-3 mr-3">
                                <label for="name" class="pl-3 col-form-label">{{ __('Full Names') }}</label>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="round-input" type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        name="name" value="{{ old('name') }}"
                                                                        required autocomplete="name" autofocus
                                                                        placeholder="Full names">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ml-3 mr-3">
                                <label for="email" class="pl-3 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="round-input" type="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        name="email" value="{{ old('email') }}"
                                                                        required autocomplete="email"
                                                                        placeholder="name@example.com">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ml-3 mr-3">
                                <label for="password" class="pl-3 col-form-label">{{ __('Password') }}</label>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="round-input" type="password"
                                                                                class="form-control @error('password') is-invalid @enderror"
                                                                                name="password" required autocomplete="new-password"
                                                                                placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ml-3 mr-3">
                                <label for="password-confirm" class="pl-3 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="round-input" type="password"
                                                                                                class="form-control"
                                                                                                name="password_confirmation"
                                                                                                required autocomplete="new-password"
                                                                                                placeholder="Confirm password">
                                </div>
                            </div>

                            <div class="form-group form-check row ml-3 mr-3">
                                <input class="mr-2" type="checkbox" name="agreement" id="agreement" {{ old('agreement') ? 'checked' : '' }}>

                                <label class="form-check-label" for="agreement">
                                    {{ __('I accept Terms of Use & Privacy Policy.') }}
                                </label>
                              </div>

                            <div class="form-group row ml-3 mr-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                    <button id="round-button-2" type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group  row mt-3 ml-3 mr-3 text-center">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label class="col-form-label">
                                        <span class="mr-2">{{ __('Already have an account?') }} </span>
                                        <a href="{{ url('/login') }}" style="text-decoration: none">Login here!</a>
                                    </label>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
