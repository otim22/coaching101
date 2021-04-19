@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}" class="disabled">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}" class="disabled">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Audience</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <form action="{{ route('audiences') }}" method="POST">
                    @csrf
                    <div class="fast-transition mb-3">
                        <div class="row m-2 pt-2">
                            <div class="cols-sm-12 col-md-12 col-lg-12">
                                <h5 class="bold">Target your students</h5> <hr />
                                <p class="mb-4 mt-4">The descriptions you write here will help students decide if your class is the one for them.</p>
                            </div>

                            <div class="cols-sm-12 col-md-12 col-lg-12">
                                <div class="form-group dynamic_student_learn">
                                    <label for="students_learn">What will students learn in your class?</label>
                                    <div class="input-group student_learn_section">
                                        <div class="students_learn_input">
                                            <input type="text"
                                                        id="students_learn"
                                                        value="{{old('student_learn.0')}}"
                                                        class="form-control form-control-sm mb-2 @error('student_learn.0') is-invalid @enderror"
                                                        placeholder="Example: English, Origin of man"
                                                        name="student_learn[]" required>
                                        </div>
                                        <div class="hidden" id="hidden_student_learn">
                                            <p class="delete_student_learn">x</p>
                                        </div>
                                    </div>
                                    @error('student_learn.0')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="cols-sm-12 col-md-12 col-lg-12 mb-3">
                                <p class="btn_students_learn hidden" type="button">
                                    <span class="mr-1">
                                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        </svg>
                                    </span>
                                    Add answer
                                </p>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group dynamic_class_requirement">
                                    <label for="class_requirement">Are there any class requirements or prerequisites?</label>
                                    <div class="input-group class_requirement_section">
                                        <div class="class_requirement_input">
                                            <input type="text"
                                                        id="class_requirement"
                                                        value="{{old('class_requirement.0')}}"
                                                        class="form-control form-control-sm mb-2  @error('class_requirement.0') is-invalid @enderror"
                                                        placeholder="Example: Should know basic literacy"
                                                        name="class_requirement[]" required>
                                        </div>
                                        <div class="hidden" id="hidden_class_requirement">
                                            <p class="delete_class_requirement">x</p>
                                        </div>
                                    </div>
                                    @error('class_requirement.0')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                <p class="btn_class_requirement hidden" type="button">
                                    <span class="mr-1">
                                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        </svg>
                                    </span>
                                    Add answer
                                </p>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group dynamic_target_students">
                                    <label for="target_students">Who are your target students?</label>
                                    <div class="input-group target_students_section">
                                        <div class="target_students_input">
                                            <input type="text"
                                                        id="target_students"
                                                        class="form-control form-control-sm mb-2 @error('target_student.0') is-invalid @enderror"
                                                        placeholder="Example: Senior two students"
                                                        name="target_student[]" required>
                                        </div>
                                        <div class="hidden" id="hidden_target_students">
                                            <p class="delete_target_students">x</p>
                                        </div>
                                    </div>
                                    @error('target_student.0')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                <p class="btn_target_students hidden" type="button">
                                    <span class="mr-1">
                                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        </svg>
                                    </span>
                                    Add answer
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between mt-5">
                        <div><h6 class="bold">Step 2 of 3</h6></div>
                        <div>
                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block btn-sm pl-5 pr-5 ml-3 mr-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@include('teacher.manage_subject.audience.partials.js_files')
