@extends('layouts.app')

@section('content')
<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <div class="row m-2 pt-2">
                    <p>{{ $topic->content_title }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
