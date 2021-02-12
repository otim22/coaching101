@extends('layouts.app')

@section('content')

<section class="section-one bg-subject text-white">
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h5 class="bold">{{ $subject->title }}</h5>
                <h6>{{ $subject->subtitle }}</h6>
                <p>{{ count($subject->subscriptions) }} Enrolled Students <br />
                Created by {{ $subject->creator->name }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="border mr-4 p-4 rounded bg-gray-3 mb-5">
                    <h5 class="bold">What you will learn</h5>
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
                        <h5 class="bold">Subject Content</h5>
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
                                        @if($subject->isSubscribedTo)
                                            <a href="{{ route('student.show', [$subject, $topic]) }}" style="text-decoration: none">
                                                <i class="fa subject-icon fa-play-circle"></i>{{ $topicMedia->name }}
                                            </a>
                                        @else
                                            <i class="fa subject-icon fa-play-circle"></i>{{ $topicMedia->name }}
                                        @endif
                                    </p>
                                @empty
                                    <p>No available attachments.</p>
                                @endforelse

                                @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                    @if($subject->isSubscribedTo)
                                        <p>
                                            <a target="_blank" href="{{ $topicMedia->name }}" style="text-decoration: none">
                                                <i class="fa subject-icon fa-file"></i>{{ $topicMedia->name }}
                                            </a>
                                        </p>
                                    @else
                                        <p><i class="fa subject-icon fa-file"></i>{{ $topicMedia->name }}</p>
                                    @endif
                                @empty
                                    <p>No available attachments.</p>
                                @endforelse
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
                    <h5 class="bold">Requirements</h5>
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
                    <h5 class="bold">Description</h5>
                    <p>{{ $subject->description }}</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                @if($subject->isSubscribedTo)
                    <aside class="p-3 p-4 border rounded bg-white add-shadow">
                        <h5 class="bold">This subject includes:</h5>
                        <ul>
                            <li>
                                <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                </svg>
                                Hours of on demand videos
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
                    </aside>
                @else
                    <aside class="p-3 p-4 border rounded bg-white add-shadow">
                        <div class="make-me-sticky">
                            <div class="mb-4 d-flex ">
                                <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                <div>
                                    <a id="round-button-2" class="btn btn-outline-primary btn-sm ml-3" href="{{ route('checkout.index') }}">Buy now</a>
                                </div>
                            </div>
                            </div>
                            <h5 class="bold">This subject includes:</h5>
                            <ul>
                                <li>
                                    <svg width="1.1em" height="1.1em" viewBox="0 0 16 19" class="bi bi-check2-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                    </svg>
                                    Hours of on demand videos
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
                @endif
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <h5 class="bold"> More subjects by {{ $subject->creator->name }}</h5>
            </div>
            @foreach($subjects as $subject)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('subjects.show', $subject->slug) }}" style="text-decoration: none">
                    <div class="card mb-4">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                            <img src="{{ $subject->default_image}}" alt="{{ $subject->very_short_title }}" width="100%" height="130">
                        </a>
                        <div class="card-body card-body_custom">
                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $subject->very_short_title }}</span><br />
                                <span class="author-font">By {{$subject->creator->name }}</span>
                                @if($subject->averageRating)
                                    <div class="star-display">
                                        @for($i = 0; $i <= $subject->averageRating; $i++)
                                            <label for="rate-{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        <span class="title-font ml-3">({{ count($subject->subscriptions) }})</span>
                                    </div>
                                @else
                                <div class="rating">
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <span class="title-font ml-3">({{ count($subject->subscriptions) }})</span><br />
                                </div>
                                @endif
                                <span class="bold">UGX {{ number_format($subject->price) }}/-</span>
                            </a>
                            <div class="mt-2 d-flex justify-content-between">
                                <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
