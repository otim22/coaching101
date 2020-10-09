@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-4">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('teacher.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Message</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-8 offset-2">
                <form action="{{ route('messages.update', $subject) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="fast-transition mb-3">
                        <div class="row m-2">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h3>Subject messages</h3> <hr />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="welcome_message" class="bold">Welcome Message</label>
                                    <div class="input-group">
                                        <textarea class="form-control @error('welcome_message') is-invalid @enderror"
                                                            name="welcome_message"
                                                            rows="3"
                                                            required>{{ old('welcome_message', $subject->message['welcome_message']) }}
                                        </textarea>
                                    </div>
                                    @error('welcome_message')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="congragulation_message" class="bold">Congratulations Message</label>
                                    <div class="input-group">
                                        <textarea class="form-control @error('congragulation_message') is-invalid @enderror"
                                                            name="congragulation_message"
                                                            rows="3"
                                                            required>{{ old('welcome_message', $subject->message['congragulation_message']) }}
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
                        <div>
                            <a href="{{ route('subjects.show', $subject) }}" class="btn btn-secondary btn-block pl-5 pr-5">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Back
                            </a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block btn-md pl-5 pr-5 ml-3 mr-3">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
