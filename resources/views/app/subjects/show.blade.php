@extends('layouts.app')

@section('content')

<section class="section-one bg-subject text-white">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                    <h3>{{ $subject->subject_title }}</h3>
                    <h5>{{ $subject->subject_subtitle }}</h5>
                    <h6>100 Students</h6>
                    <h6>Created by Otim Fredrick</h6><br />
            </div>
        </div>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="border mr-2 p-4 rounded bg-gray mb-5">
                    <h4>What you will learn</h4>
                    <ul>
                        @foreach($subject->options['students_learn'] as $student_learn)
                        <li>
                            <svg width="1.8em" height="1.8em" viewBox="0 0 16 19" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                            </svg>
                                {{ $student_learn }}
                         </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-4">
                    <h4>Subject Content</h4>
                </div>

                <div class="accordion mb-4" id="accordionExample">
                  <div class="card">
                      @foreach($subject->sections as $section)
                        <div class="card-header" id="{{ $section->id }}">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $section->id }}" aria-expanded="true" aria-controls="collapse{{ $section->id }}">
                                {{ $section->content_title }}
                            </button>
                          </h2>
                        </div>

                        <div id="collapse{{ $section->id }}" class="collapse {{ $section->id === 1 ? 'show' : '' }}" aria-labelledby="{{ $section->id }}" data-parent="#accordionExample">
                          <div class="card-body">
                            {{ $section->main_content_files }}
                          </div>
                        </div>
                    @endforeach
                  </div>
                </div>

                <div class="mb-5">
                    <h4>Requirements</h4>
                    <ul>
                        @foreach($subject->options['class_requirement'] as $class_requirement)
                        <li>
                            <svg width="2em" height="2em" viewBox="0 0 18 18" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg>
                            {{ $class_requirement }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div  class="mb-5">
                    <h4>Description</h4>
                    <p>{{ $subject->subject_description }}</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                <aside class="p-3 p-4 border rounded bg-white add-shadow">
                    <div class="make-me-sticky">
                        <div class="mb-3">
                            <a class="btn btn-danger btn-block" href="#">Go to subject</a>
                        </div>
                        <h5>This subject includes:</h5>
                        <ul>
                            <li>
                                <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                </svg>
                                3 hours on-demand video
                            </li>
                            <li>
                                <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                </svg>
                                2 articles
                            </li>
                            <li>
                                <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                </svg>
                                5 downloadable resources
                            </li>
                            <li>
                                <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                </svg>
                                Full lifetime access
                            </li>
                            <li>
                                <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                </svg>
                                Access on mobile and TV
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <h4> More subjects by Otim fredrick</h4>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="mb-3">
                    <img src="https://fakeimg.pl/440x240" alt="faker image">
                </div>
                <h5>Subject title</h5>
                <h6>Subject description</h6>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="mb-3">
                    <img src="https://fakeimg.pl/440x240" alt="faker image">
                </div>
                <h5>Subject title</h5>
                <h6>Subject description</h6>
            </div>
        </div>
    </div>
</section>

@endsection
