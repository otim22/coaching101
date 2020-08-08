@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 pt-4">
                <div class="card">
                    <div class="card-header" id="grayBg">
                        <div class="ml-4 mr-4 p-1 pt-2">
                            <h5>{{ __('Register and Enjoy learning') }}</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row ml-3 mr-3">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Full Names') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
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
                                <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
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
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
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
                                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password"
                                                                                                class="form-control"
                                                                                                name="password_confirmation"
                                                                                                required autocomplete="new-password"
                                                                                                placeholder="Confirm password">
                                </div>
                            </div>

                            <div class="form-group form-check row ml-3 mr-3">
                                <input class="mr-2" type="checkbox" name="agreement" id="agreement" {{ old('agreement') ? 'checked' : '' }}>

                                <label class="form-check-label" for="agreement">
                                    {{ __('I Agree To The Terms and Conditions') }}
                                </label>
                              </div>

                            <div class="form-group row ml-3 mr-3">
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group  row mt-3 ml-3 mr-3 text-center">
                                <div class="col-md-12">
                                    <label class="col-form-label"> <span class="mr-2">{{ __('Already have an account?') }} </span><a href="{{ url('/login') }}">Sign In</a></label>
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
