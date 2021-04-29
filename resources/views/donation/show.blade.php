@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 mt-5">
                <p class="mb-4">Thank you <span class="bold">{{ $donor->sponsor_name }}</span> for your generous giving.</p>
                <a id="round-button-2" class="btn btn-secondary btn-sm pl-5 pr-5" href="{{ url('/')}}">Go Home</a>
            </div>
        </div>
    </div>
</section>

@endsection
