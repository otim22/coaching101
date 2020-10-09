@extends('layouts.app')

@section('content')
<section class="section-bread bg-gray-4">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ url('/') }}" class="disabled">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('teacher.subjects') }}" class="disabled">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Message</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-8">
                <form action="{{ route('messages', $subject) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="fast-transition mb-3">
                        <div class="row m-2">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h3>Subject messages</h3> <hr />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="welcome_message">Welcome Message</label>
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
                                    <label for="congragulation_message">Congratulations Message</label>
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
                        <div>
                            <h5>Step 3 of 3</h5>
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
