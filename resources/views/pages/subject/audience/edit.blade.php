@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-4">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Audience</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-8">
                <form action="{{ route('audiences.update', $subject) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="fast-transition mb-3">
                        <div class="row m-2">
                            <div class="cols-sm-12 col-md-12 col-lg-12">
                                <h3>Target your students</h3> <hr />
                                <p class="lead mb-4 mt-4">The descriptions you write here will help students decide if your class is the one for them.</p>
                            </div>

                            <div class="cols-sm-12 col-md-12 col-lg-12">
                                <div class="form-group dynamic_student_learn">
                                    <label for="students_learn" class="bold">What will students learn in your class?</label>
                                    <p class="mt-3">Current objectives</p>
                                    @forelse($subject->audience->student_learn as $student_learn)
                                    <p>
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                        </svg>
                                        {{ $student_learn }}
                                    </p>
                                    @empty
                                    <p>Nothing to learn</p>
                                    @endforelse
                                    <small class="form-text text-muted">
                                        <p class="red_color"><strong>Note:</strong> Adding new information will override all current objectives. Be sure you include current ones you don't want to loose.</p>
                                    </small>
                                    <div class="input-group student_learn_section">
                                        <div class="students_learn_input">
                                            <input type="text"
                                                        id="students_learn"
                                                        value="{{ old('student_learn.0') }}"
                                                        class="form-control form-control-sm mb-2 @error('student_learn.0') is-invalid @enderror"
                                                        placeholder="Example: English, Origin of man"
                                                        name="student_learn[]">
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
                                    <label for="class_requirement" class="bold">Are there any class requirements or prerequisites?</label>
                                    <p class="mt-3">Current class requirements</p>
                                    @forelse($subject->audience->class_requirement as $class_requirement)
                                    <p>
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                        </svg>
                                        {{ $class_requirement }}
                                    </p>
                                    @empty
                                    <p>Nothing to requirements</p>
                                    @endforelse
                                    <small class="form-text text-muted">
                                        <p class="red_color"><strong>Note:</strong> Adding new information will override all current class requirements. Be sure you include current ones you don't want to loose.</p>
                                    </small>
                                    <div class="input-group class_requirement_section">
                                        <div class="class_requirement_input">
                                            <input type="text"
                                                        id="class_requirement"
                                                        value="{{old('class_requirement.0')}}"
                                                        class="form-control form-control-sm mb-2  @error('class_requirement.0') is-invalid @enderror"
                                                        placeholder="Example: Should know basic literacy"
                                                        name="class_requirement[]">
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
                                    <label for="target_students" class="bold">Who are your target students?</label>
                                    <p class="mt-3">Current target students</p>
                                    @forelse($subject->audience->target_student as $target_student)
                                    <p>
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                        </svg>
                                        {{ $target_student }}
                                    </p>
                                    @empty
                                    <p>Nothing to targeted students</p>
                                    @endforelse
                                    <small class="form-text text-muted">
                                        <p class="red_color"><strong>Note:</strong> Adding new information will override all current target students. Be sure you include current ones you don't want to loose.</p>
                                    </small>
                                    <div class="input-group target_students_section">
                                        <div class="target_students_input">
                                            <input type="text"
                                                        id="target_students"
                                                        value="{{old('target_student.0')}}"
                                                        class="form-control form-control-sm mb-2 @error('target_student.0') is-invalid @enderror"
                                                        placeholder="Example: Senior two students"
                                                        name="target_student[]">
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
                        <div>
                            <a href="{{ route('subjects.show', $subject) }}" class="btn btn-secondary btn-block">
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

                @include('pages.subject.audience.partials.js_files')
            </div>
        </div>
    </div>
</section>

@endsection
