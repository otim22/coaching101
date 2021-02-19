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
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="fast-transition-white  p-4">
                    <form action="{{ route('account-update') }}" method="POST">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="name">Full names</label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4 mb-5">
                            <div class="mb-2"><p>Current avatar</p></div>
                            <img src="{{ asset($user->getFirstMediaUrl()) }}" alt="{{ $user->slug }}">

                            <div class="mb-3 mt-2">
                                <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" name="avatar" id="avatar">
                            </div>
                            @error('avatar')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
