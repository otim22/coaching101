@extends('layouts.app')

@section('content')
<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="disabled">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}" class="disabled">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}" class="disabled">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Message</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <form action="{{ route('messages', $subject) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="fast-transition mb-3">
                        <div class="row m-2">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5>Subject messages</h5> <hr />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="welcome_message">Welcome message</label>
                                    <div class="input-group">
                                        <textarea class="form-control @error('welcome_message') is-invalid @enderror"
                                                            name="welcome_message"
                                                            placeholder="Example: You are welcome to the subject"
                                                            rows="3"
                                                            required>{{ old('welcome_message') }}
                                        </textarea>
                                    </div>
                                    @error('welcome_message')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="congragulation_message">Congratulations message</label>
                                    <div class="input-group">
                                        <textarea class="form-control @error('congragulation_message') is-invalid @enderror"
                                                            name="congragulation_message"
                                                            placeholder="Example: Congragulations for completing the subject"
                                                            rows="3"
                                                            required>{{ old('congragulation_message') }}
                                        </textarea>
                                    </div>
                                    @error('congragulation_message')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between mt-5">
                        <div><h5>Step 3 of 3</h5></div>
                        <div>
                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block btn-md pl-5 pr-5 ml-3 mr-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
