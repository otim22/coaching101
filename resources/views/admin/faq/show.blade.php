@extends('admin.layouts.master')

@section('title', 'Student Image')

@section('content')

@include('flash.messages')

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
        <div class="card admin-shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary mr-2">
                            {{ __('Back') }}
                        </a>
                    </div>
                    <div>
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                        <div class="dropdown-menu"  style="position: absolute; will-change: transform; left: 0px; transform: translate3d(-5px, 31px, 0px);">
                            <a class="dropdown-item" href="{{ route('admin.faqs.edit', $faq) }}"><i class="fa fa-edit"></i> Edit
                            <a class="dropdown-item"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-item').submit();">
                                {{ __('Delete') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4> Title</h4>
                    <p class="increased-font">{{ $faq->title }}</p>
                </div>
                <div class="mb-4">
                    <h4> Description</h4>
                    <p class="increased-font">{{ $faq->description }}</p>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.faqs.destroy', $faq) }}" class="hidden" id="delete-item" method="post">
            @csrf
            @method('delete')
        </form>
    </div>
</div> <!-- .content -->
@endsection
