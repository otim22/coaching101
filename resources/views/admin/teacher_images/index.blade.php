@extends('admin.layouts.master')

@section('title', 'Teacher Image')

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
                            @if(count($teacherImages) === 0)
                                <a type="button" class="btn btn-secondary float-right" href="{{ route('admin.teacherImages.create') }}">
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
                                    @forelse ($teacherImages as $teacherImage)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.teacherImages.show', $teacherImage) }}">
                                                    <img src="{{ asset($teacherImage->image_thumb) }}" class="mw-100" height="36" alt="Student image" />
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <a href="{{ route('admin.teacherImages.show', $teacherImage) }}" style="text-decoration: none">
                                                    <p> {{ $teacherImage->short_title }}</p>
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <p>{{ $teacherImage->description_snippet }}</p>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin.teacherImages.edit', $teacherImage) }}" class="btn btn-outline-primary float-left mr-2">{{ __('Edit') }} </a>
                                                {!! Form::open(['route' => ['admin.teacherImages.destroy', $teacherImage],
                                                        'method' => 'delete',
                                                        'data-confirmation-text' => __('Are you sure to delete :name?', ['title' => $teacherImage->title])
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
