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
                            <h4 class="card-title mt-1 increased-font"><strong>All</strong>  available faqs</h4>
                        </div>
                        <div>
                            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.faqs.create') }}">
                                Create new faq
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <td class="pt-3">
                                                <a href="{{ route('admin.faqs.show', $faq) }}" style="text-decoration: none">
                                                    <p> {{ $faq->short_title }}</p>
                                                </a>
                                            </td>
                                            <td class="pt-3">
                                                <p>{{ $faq->description_snippet }}</p>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-outline-primary float-left mr-2">{{ __('Edit') }} </a>
                                                {!! Form::open(['route' => ['admin.faqs.destroy', $faq],
                                                        'method' => 'delete',
                                                        'data-confirmation-text' => __('Are you sure to delete :name?', ['title' => $faq->title])
                                                    ])
                                                !!}
                                                    <button type="submit" class="btn btn-outline-danger float-left">{{ __('Delete') }}</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="increased-font">No faqs available</p>
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
