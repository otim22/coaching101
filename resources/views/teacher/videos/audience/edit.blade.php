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
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Audience</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section class="small-screen_padding">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <form action="{{ route('audiences.update', $subject) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="card p-3">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-between">
                                <div>
                                    <h5 class="bold">Target your students</h5>
                                </div>
                                <div>
                                    <a id="round-button-2" href="{{ route('subjects.show', $subject) }}" class="btn btn-md btn-secondary btn-block pl-5 pr-5">
                                        <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                        </svg>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-4 mb-4">
                                <hr />
                            </div>
                            <div class="cols-sm-12 col-md-12 col-lg-12">
                                <div class="form-group dynamic_student_learn">
                                    <div class="bold">
                                        <label for="students_learn">What will students learn in your class?</label>
                                    </div>
                                    @if($subject->audience)
                                        <p class="mt-2">Current learning objectives</p>
                                    @endif
                                    @foreach($subject->audience->student_learn as $key => $student_learn)
                                        <div class="d-flex justify-content-between">
                                            <div style="flex-grow:1">
                                                <input type="text"
                                                            value="{{ $student_learn }}"
                                                            class="form-control form-control mb-2 @error('student_learn.*') is-invalid @enderror"
                                                            placeholder="Example: Origin of languages"
                                                            name="student_learn[]">
                                            </div>
                                            <div>
                                                <p class="delete_note_objective student_learn-delete" data-student_learn-id="{{ $key }}" data-student_learn-delete-url="{{ route('teacher.subject.student_learn.destroy', ['subject' => $subject, 'audience' => $key]) }}">x</p>
                                            </div>
                                        </div>
                                        @error('student_learn.*')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    @endforeach
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
                                    <div class="bold">
                                        <label for="class_requirement">Are there any class requirements or prerequisites?</label>
                                    </div>
                                    @if($subject->audience)
                                        <p class="mt-3">Current class requirements</p>
                                    @endif
                                    @foreach($subject->audience->class_requirement as $key => $class_requirement)
                                        <div class="d-flex justify-content-between">
                                            <div style="flex-grow:1">
                                                <input type="text"
                                                            value="{{ $class_requirement }}"
                                                            class="form-control form-control mb-2 @error('class_requirement.*') is-invalid @enderror"
                                                            placeholder="Example: Origin of languages"
                                                            name="class_requirement[]">
                                            </div>
                                            <div>
                                                <p class="delete_note_objective class_requirement-delete" data-class_requirement-id="{{ $key }}" data-class_requirement-delete-url="{{ route('teacher.subject.class_requirement.destroy', ['subject' => $subject, 'audience' => $key]) }}">x</p>
                                            </div>
                                        </div>
                                        @error('class_requirement.*')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    @endforeach
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
                                    <div class="bold">
                                        <label for="target_students">Who are your target students?</label>
                                    </div>
                                    @if($subject->audience)
                                        <p class="mt-3">Current target students</p>
                                    @endif
                                    @foreach($subject->audience->target_student as $key => $target_student)
                                        <div class="d-flex justify-content-between">
                                            <div style="flex-grow:1">
                                                <input type="text"
                                                            value="{{ $target_student }}"
                                                            class="form-control form-control mb-2 @error('target_student.*') is-invalid @enderror"
                                                            placeholder="Example: Origin of languages"
                                                            name="target_student[]">
                                            </div>
                                            <div>
                                                <p class="delete_note_objective target_student-delete" data-target_student-id="{{ $key }}" data-target_student-delete-url="{{ route('teacher.subject.target_student.destroy', ['subject' => $subject, 'audience' => $key]) }}">x</p>
                                            </div>
                                        </div>
                                        @error('target_student.*')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    @endforeach
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
                            <a id="round-button-2" href="{{ route('subjects.show', $subject) }}" class="btn btn-secondary btn-md btn-block pl-5 pr-5">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Back
                            </a>
                        </div>
                        <div>
                            <button  id="round-button-2" type="submit" class="btn btn-primary btn-block btn-md  pl-5 pr-5 ml-3 mr-3">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/audience.js')}}" type="text/javascript"></script>
@endpush
