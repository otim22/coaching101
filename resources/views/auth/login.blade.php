@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card auth-card">
                    <div class="card-header" id="grayBg">
                        <div class="pt-3 mb-3 text-center">
                            <h4 class="bold">{{ __('Login') }}</h4>
                            <p class="text-muted">Enjoy your learning here.</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row ml-3 mr-3 mt-3">
                                <label for="email" class="pl-3 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="round-input" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="round-input" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-check custom-check">
                                        <input class="mr-2 ml-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ml-3 mr-3">
                                <div class="col-md-12 mt-3">
                                    <button id="round-button-2" type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row mb-0 ml-3 mr-3">
                                <div class="col-md-12 text-center">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group  row ml-3 mr-3 text-center">
                                <div class="col-md-12">
                                    <label class="col-form-label">
                                        <span class="mr-2">{{ __('Don\'t have an account?') }} </span>
                                        <a href="{{ url('/register') }}" style="text-decoration: none">Register here!</a>
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
