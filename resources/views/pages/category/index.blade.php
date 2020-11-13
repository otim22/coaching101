@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                    {{ $category->name }}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        @include('partials.categories')
    </section>

@endsection
