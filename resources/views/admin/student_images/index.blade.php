@extends('admin.layouts.master')

@section('title', 'Student Image')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h4 class="card-title mt-1 increased-font"><strong>All</strong>  available images</h4>
                        </div>
                        <div>
                            @if(count($studentImages) === 0)
                                <a type="button" class="btn btn-secondary float-right" href="{{ route('admin.studentImages.create') }}">
                                    Create new
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
                                    @forelse ($studentImages as $studentImage)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.studentImages.show', $studentImage) }}">
                                                    <img src="{{ asset($studentImage->image_thumb) }}" class="mw-100" height="36" alt="Student image" />
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <a href="{{ route('admin.studentImages.show', $studentImage) }}" style="text-decoration: none">
                                                    <p> {{ $studentImage->short_title }}</p>
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <p>{{ $studentImage->description_snippet }}</p>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin.studentImages.edit', $studentImage) }}" class="btn btn-outline-primary float-left mr-2">{{ __('Edit') }} </a>
                                                {!! Form::open(['route' => ['admin.studentImages.destroy', $studentImage],
                                                        'method' => 'delete',
                                                        'data-confirmation-text' => __('Are you sure to delete :name?', ['title' => $studentImage->title])
                                                    ])
                                                !!}
                                                    <button type="submit" class="btn btn-outline-danger float-left">{{ __('Delete') }}</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="increased-font">No images available</p>
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
