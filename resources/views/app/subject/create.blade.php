@extends('layouts.app')

@section('content')

<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <form action="{{ route('subjects') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="fast-transition mb-3">
                        <div class="row m-2 pb-2">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h3>Subject introduction</h3> <hr />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="title">Subject title</label>
                                    <div class="input-group">
                                        <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    id="title"
                                                    placeholder="Your subject title"
                                                    aria-label="Your subject title"
                                                    aria-describedby="title"
                                                    name="title"
                                                    value="{{ old('title') }}"
                                                    required>
                                    </div>
                                    @error('title')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Sub-title</label>
                                    <div class="input-group">
                                        <input type="text"
                                                    class="form-control @error('subtitle') is-invalid @enderror"
                                                    id="subtitle"
                                                    placeholder="Write your sub title"
                                                    aria-label="Write your sub title"
                                                    aria-describedby="subtitle"
                                                    name="subtitle"
                                                    value="{{ old('subtitle') }}">
                                        @error('subtitle')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description of the subject" name="description" value="{{ old('description') }}" rows="3" required></textarea>
                                    @error('description')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Category</label>
                                    <div class="input-group">
                                        <input type="text"
                                                    class="form-control @error('category') is-invalid @enderror"
                                                    id="category"
                                                    placeholder="Eaxmple: Modern physics"
                                                    aria-label="category"
                                                    aria-describedby="category"
                                                    name="category"
                                                    value="{{ old('category') }}" required>
                                    </div>
                                    @error('category')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cover_image">Cover Image</label>
                                    <input type="file" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image" required>
                                    @error('cover_image')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between mt-5">
                        <div>
                            <h5>Step 1 of 3</h5>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block btn-md pl-5 pr-5 ml-3 mr-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
