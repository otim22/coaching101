@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('content')

@include('flash.messages')

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
        <div class="card p-3">
            <div class="card-header">
                <div class="card-actionbar float-right mb-2">
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary mr-2">
                        {{ __('Back') }}
                    </a>

                    <div class="btn-group">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                        <div class="dropdown-menu"  style="position: absolute; will-change: transform; left: 0px; transform: translate3d(-5px, 31px, 0px);">
                            <a class="dropdown-item" href="{{ route('admin.sliders.edit', $slider) }}"><i class="fa fa-edit"></i> Edit
                            <a class="dropdown-item"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-item').submit();">
                                {{ __('Delete') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body card-block">
                <div class="mb-4">
                    <h3> Title</h3>
                    <p class="increased-font">{{ $slider->title }}</p>
                </div>
                <div class="mb-4">
                    <h3> Slider Image</h3>
                    <img src="{{ asset($slider->getFirstMediaUrl()) }}" class="w-50"><br>
                </div>
                <div class="mb-4">
                    <h3> Description</h3>
                    <p class="increased-font">{!! $slider->description !!}</p>
                </div>
                <div class="mb-4">
                    <h3>Button</h3>
                    <p class="increased-font"><a href="{{ url($slider->button_link) }}">{{ $slider->button_text }}</a></p>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.sliders.destroy', $slider) }}"
            class="hidden"
            id="delete-item"
            method="post">
            @csrf
            @method('delete')
        </form>
    </div>
</div> <!-- .content -->
@endsection
