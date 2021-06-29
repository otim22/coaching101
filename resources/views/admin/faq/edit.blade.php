@extends('admin.layouts.master')

@section('title', 'Student Image')

@section('content')

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10 col-sm-12 mt-5 pt-5 mb-5">
                <div class="float-right mb-3">
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        {{ __('Back') }}
                    </a>
                </div>
                <form action="{{ route('admin.faqs.update', $faq) }}" method="POST"
                            enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">
                            <h4>Title</h4>
                        </label>
                        <input type="text"
                                    id="title"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $faq->title) }}">
                        @error('title')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="description"><h4>Description</h4></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Description">{{ old('description', $faq->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
