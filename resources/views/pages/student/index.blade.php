@extends('layouts.app')

@section('content')

<section class="section-one bg-subject text-white">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                    <h5 class="bold">{{ $subject->title }}</h5>
                    <h5>{{ $subject->subtitle }}</h5>
                    <p>100 Enrolled Students</p>
                    <p>Created by {{ $subject->creator->name }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="border mr-4 p-4 rounded bg-gray-3 mb-5">
                    <h4 class="bold">What you will learn</h4>
                    <ul>
                        @forelse($subject->audience['student_learn'] as $student_learn)
                        <li>
                            <svg width="1.8em" height="1.8em" viewBox="0 0 16 19" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                            </svg>
                                {{ $student_learn }}
                         </li>
                        @empty
                        <p>Get ready to learn a lot of things.</p>
                        @endforelse
                    </ul>
                </div>

                <div class="accordion mr-4 mb-5" id="accordionExample">
                    <div class="mb-4">
                        <h4 class="bold">Subject Content</h4>
                    </div>
                  <div class="card">
                      @forelse($subject->topics as $key => $topic)
                      <div class="card-header" id="{{ $topic->id }}">
                          <p class="mb-0">
                            <button  id="id{{ $topic->id }}" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $topic->id }}" aria-expanded="true" aria-controls="collapse{{ $topic->id }}" style="text-decoration: none">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            {{ $key+1 }} - {{ $topic->title }}
                                        </div>
                                        <div>
                                            <span class="icon">
                                                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </button>
                            </p>
                      </div>

                      <div id="collapse{{ $topic->id }}" class="collapse {{ $topic->id === 1 ? 'show' : '' }}" aria-labelledby="{{ $topic->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                                @forelse($topic->getMedia('content_file') as $key => $topicMedia)
                                <p class="mt-1">
                                    <a href="{{ route('subjects.show', [$subject, $topic]) }}" style="text-decoration: none">
                                        <i class="fa subject-icon fa-play-circle"></i>{{ $topicMedia->name }}
                                    </a>
                                </p>
                                @empty
                                <p>No available attachments.</p>
                                @endforelse

                                @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                <p>
                                    <a target="_blank" href="{{ $topicMedia->name }}" style="text-decoration: none">
                                        <i class="fa subject-icon fa-file"></i>{{ $topicMedia->name }}
                                    </a>
                                </p>
                                @empty
                                <p>No available attachments.</p>
                                @endforelse
                            </ul>
                        </div>
                      </div>
                    @empty
                    <div class="p-3">
                        <p>No topics available yet!</p>
                    </div>
                    @endforelse
                  </div>
                </div>

                <div class=" mr-4 mb-5">
                    <h4 class="bold">Requirements</h4>
                    <ul>
                        @forelse($subject->audience['class_requirement']  as $class_requirement)
                        <li>
                            <svg width="2em" height="2em" viewBox="0 0 18 18" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg>
                            {{ $class_requirement }}
                        </li>
                        @empty
                        <p>No subject requirements indicated.</p>
                        @endforelse
                    </ul>
                </div>

                <div  class=" mr-4 mb-5">
                    <h4 class="bold">Description</h4>
                    <p>{{ $subject->description }}</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                <aside class="p-3 p-4 border rounded bg-white add-shadow">
                    <div class="make-me-sticky">
                        <div class="mb-4">
                            <a id="round-button-2" class="btn btn-danger btn-block mb-2" href="#">Add to cart</a>
                            <a id="round-button-2" class="btn btn-outline-primary btn-block" href="{{ route('checkout.index') }}">Buy now</a>
                        </div>
                        </div>
                        <h5 class="bold">This subject includes:</h5>
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
                                {{ $resourceCount }} downloadable resources
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
    </div>
</section>

<section class="bg-gray-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <h4 class="bold"> More subjects by {{ $subject->creator->name }}</h4>
            </div>
            @foreach($subjects as $subject)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                <div class="mb-3">
                    <img src="{{ asset($subject->image_thumb) }}" alt="{{ $subject->very_short_title }}">
                </div>
                <h5> {{ $subject->very_short_title }}</h5>
                <p>{{ $subject->creator->name }}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
