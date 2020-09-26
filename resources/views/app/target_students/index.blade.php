<div class="fast-transition mb-3">
    <form action="{{ url('target_student_submission') }}" method="POST">
        @csrf
        <div class="row m-2 pt-2">
            <div class="cols-sm-12 col-md-12 col-lg-12">
                <h3>Target your students</h3> <hr />
                <p class="lead mb-4 mt-4">The descriptions you write here will help students decide if your class is the one for them.</p>
            </div>

            <div class="cols-sm-12 col-md-12 col-lg-12">
                <div class="form-group dynamic_student_learn">
                    <label for="students_learn">What will students learn in your class?</label>
                    <div class="input-group student_learn_section">
                        <div class="students_learn_input">
                            <input type="text"
                                        id="students_learn"
                                        class="form-control form-control-sm mb-2"
                                        placeholder="Example: English, Origin of man"
                                        name="students_learn[]">
                        </div>
                        <div class="hidden" id="hidden_student_learn">
                            <p class="delete_student_learn">x</p>
                        </div>
                    </div>
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
                                        class="form-control form-control-sm mb-2"
                                        placeholder="Example: Should know basic literacy"
                                        name="class_requirement[]">
                        </div>
                        <div class="hidden" id="hidden_class_requirement">
                            <p class="delete_class_requirement">x</p>
                        </div>
                    </div>
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
                                        class="form-control form-control-sm mb-2"
                                        placeholder="Example: Senior two students"
                                        name="target_students[]">
                        </div>
                        <div class="hidden" id="hidden_target_students">
                            <p class="delete_target_students">x</p>
                        </div>
                    </div>
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
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                <button class="btn btn-primary btn-block"> Save </button>
            </div>
        </div>
    </form>

    @push('scripts')
        <script src="{{ asset('js/target_student.js')}}" type="text/javascript"></script>
    @endpush

    @prepend('scripts')
        <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    @endprepend
</div>
