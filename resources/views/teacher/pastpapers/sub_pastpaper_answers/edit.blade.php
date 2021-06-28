@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('manage.subjects') }}" style="text-decoration: none;">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('teacher.pastpapers') }}" style="text-decoration: none;">Past paper</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pastpaper->title }}</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="bold">Edit your pastpaper here.</h5>
                            </div>
                            <div>
                                <a id="round-button-2" href="{{ route('pastpapers.show', $pastpaper) }}" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div>
                            <hr />
                        </div>
                        <form action="{{ route('subPastpaperAnswers.update', [$pastpaper, $subPastpaperAnswer]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group mb-4 mt-2">
                                <label for="title">Past paper answer title</label>
                                <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $subPastpaperAnswer->title) }}">
                                @error('title')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="parent_id">Choose question</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="parent_id">
                                        <option selected value="{{ $subPastpaper->id }}">{{ $subPastpaper->title }}</option>
                                        @foreach($subPastpapers as $subPastpaperQtn)
                                            <option value="{{ $subPastpaperQtn->id }}">{{ $subPastpaperQtn->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parent_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="pastpapers">Current answer</label>
                                <embed src="{{ $subPastpaperAnswer->getFirstMediaUrl('answers') }}#toolbar=0" type="application/pdf" width="100%" height="300">
                                <p class="mt-2"><small class="red_color">*Choosing another file replaces this current one and should be a pdf file.</small></p>
                            </div>

                            <div class="form-group mb-4">
                                <label for="answer">Upload answer</label>
                                <input type="file" name="answer"
                                            class="form-control-file @error('answer') is-invalid @enderror"
                                            accept=".pdf">
                                <p><small class="light_gray_color">*Answer should be a pdf file</small></p>
                                @error('answer')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button id="round-button-2" type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@prepend('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pastpapers.js')}}" type="text/javascript"></script>
@endpush
