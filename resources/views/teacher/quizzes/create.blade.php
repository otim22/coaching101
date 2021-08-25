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
                <li class="breadcrumb-item active" aria-current="page">Quizzes</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section class="small-screen_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <h5 class="bold">New Quiz</h5>
                            </div>
                            <div>
                                <a  id="round-button-2" href="{{ route('teacher.quizzes') }}" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2 mb-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back quiz
                                </a>
                            </div>
                        </div>
                        <div>
                            <hr />
                        </div>
                        <form action="{{ route('quizzes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="category_id">Subject</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="category_id">
                                        <option selected>Select subject</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="standard_id">Standard</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select standard" name="standard_id">
                                        <option selected>Select standard</option>
                                        @foreach($standards as $standard)
                                            <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('standard_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="level_id">Level</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select level" name="level_id" id="level_id">
                                        <option selected>Select level</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('level_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="year_id">Year</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="year_id" id="year_id">
                                        <option selected>Select year</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('year_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="year_id">Term</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="term_id">
                                        <option selected>Select term</option>
                                        @foreach($terms as $term)
                                            <option value="{{ $term->id }}">{{ $term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('term_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Quiz title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Example: Introduction to relativity" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="item_id">Quiz category</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select item" name="item_id" id="item_id">
                                        <option selected>Select category</option>
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('item_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="item_content_id">Course where quiz belongs</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="item_content_id"  id="item_content_id">
                                        <option selected>Select course</option>
                                    </select>
                                </div>
                                @error('item_content_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button id="round-button-2" type="submit" class="btn btn-primary float-right mt-3">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/filter_item_content.js')}}" type="text/javascript"></script>
@endpush
