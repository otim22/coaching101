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
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
            </ol>
        </nav>
    </div>
</section>

<div class="container">
    @include('flash.messages')
</div>

<section class="bg-white small-screen_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12" style="margin-top: auto; margin-bottom: auto; width: 8em;">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#658ebf" class="bi bi-geo-alt ml-5" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </div>
                <h5 class="gray_color wraps-text">Old Butabika Road,</h5>
                <h5 class="gray_color wraps-text">2<sup>nd</sup> Floor</h5>
                <h5 class="mb-5 gray_color">Mutungo, <span class="wraps-text">Kampala Uganda.</span></h5>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h4 class="bold">Write us a message</h4>
                        </div>
                        <div class="pt-3 pb-4">
                            <hr />
                        </div>
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full names</label>
                                <input type="text" class="form-control" id="name" placeholder="John Deere" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="email">Email address</label>
                                <input type="text" class="form-control" placeholder="example@domain.com" name="email" value="{{ old('email') }}" />
                                @error('email')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="subject">Subject</label>
                                <input class="form-control" type="text" name="subject" value="{{ old('subject') }}" />
                                @error('subject')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="body">Body</label>
                                <textarea class="form-control" type="text" name="body" rows="3" />{{ old('body') }}</textarea>
                                @error('body')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="pt-4">
                                <button id="round-button-2" type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
