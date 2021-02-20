@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mt-1 increased-font"><strong>All</strong>  available sliders</h4>
                        </div>
                        <div>
                            @if(count($sliders) === 0)
                                <a type="button" class="btn btn-secondary float-right" href="{{ route('admin.sliders.create') }}">
                                    Add Slider
                                </a>
                            @else
                                <p class="card-title float-right" style="color: gray;">Max Image is 1</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $slider)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.sliders.show', $slider) }}">
                                                    <img src="{{ asset($slider->image_thumb) }}" class="mw-100" height="36" alt="Slider image" />
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <a href="{{ route('admin.sliders.show', $slider) }}" style="text-decoration: none">
                                                    <p> {{ $slider->short_title }}</p>
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <p>{!! $slider->description_snippet !!}</p>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-outline-primary float-left mr-2">{{ __('Edit') }} </a>
                                                {!! Form::open(['route' => ['admin.sliders.destroy', $slider],
                                                        'method' => 'delete',
                                                        'data-confirmation-text' => __('Are you sure to delete :name?', ['title' => $slider->title])
                                                    ])
                                                !!}
                                                    <button type="submit" class="btn btn-outline-danger float-left">{{ __('Delete') }}</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="increased-font">No sliders available</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
