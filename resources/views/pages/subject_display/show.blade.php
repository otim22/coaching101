@extends('layouts.app')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center  pl-5 pr-5 mt-4">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-4 ">
                <livewire:video-player :topic="$topic" :key="$topic->id" />
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        @if (isset($previous))
                            <a href="{{ url('subjects/'. $subject->slug . '/topics/' . $previous->slug) }}" type="button" name="button" style="text-decoration: none">Previous lession</a>
                        @endif
                    </div>
                    <div>
                        @if (isset($next))
                            <a href="{{ url('subjects/'. $subject->slug . '/topics/' . $next->slug) }}" type="button" class="" name="button" style="text-decoration: none">Next lession</a>
                        @endif
                    </div>
                </div>
                <div class="mt-5">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active bold" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">Description</a>
                        <a class="nav-link bold" id="nav-resource-tab" data-toggle="tab" href="#nav-resource" role="tab" aria-controls="nav-resource" aria-selected="false">Extra resources</a>
                        <a class="nav-link bold" id="nav-rate-tab" data-toggle="tab" href="#nav-rate" role="tab" aria-controls="nav-rate" aria-selected="false">Rate teacher</a>
                      </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                            <div class="mt-4">
                                <p>{{ $topic->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-resource" role="tabpanel" aria-labelledby="nav-resource-tab">
                            <div class="mt-4">
                                <ul>
                                    @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                    <li class="mb-3">
                                        <a target="_blank" href="{{ $topicMedia->getUrl() }}" style="text-decoration: none">
                                            <p><i class="fa subject-icon fa-file "></i> {{ $topicMedia->name }}</p>
                                        </a>
                                    </li>
                                    @empty
                                    <p>No available attachments.</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-rate" role="tabpanel" aria-labelledby="nav-rate-tab">
                            <div class="mt-4">
                                <livewire:rate-teacher :subject="$subject" :key="$subject->id" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside>
                    <div class="accordion make-me-sticky mr-4 mb-5" id="accordionExample">
                        <div class="mb-3">
                            <h5 class="bold">Subject content</h5>
                        </div>
                        <div class="card">
                            @forelse($subject->topics as $key => $topic)
                            <div class="card-header" id="{{ $topic->id }}">
                                <button  id="id{{ $topic->id }}" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $topic->id }}" aria-expanded="true" aria-controls="collapse{{ $topic->id }}" style="text-decoration: none">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            {{ $key + 1 }} - {{ $topic->title }}
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
                            </div>

                            <div id="collapse{{ $topic->id }}" class="collapse {{ $topic->id === 1 ? 'show' : '' }}" aria-labelledby="{{ $topic->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    @forelse($topic->getMedia('content_file') as $topicMedia)
                                        <p class="remove_bottom_margin mb-3">
                                            <a href="{{ route('student.show', [$subject, $topic]) }}" style="text-decoration: none">
                                                <i class="fa subject-icon fa-play-circle"></i>{{ $topicMedia->name }}
                                            </a>
                                        </p>
                                    @empty
                                        <p>No available attachments.</p>
                                    @endforelse

                                    @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                        <p class="remove_bottom_margin mb-3">
                                            <a target="_blank" href="{{ $topicMedia->getUrl() }}" style="text-decoration: none">
                                                <i class="fa subject-icon fa-file"></i>{{ $topicMedia->name }}
                                            </a>
                                        </p>
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
                </aside>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendor/js/videojs/video.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('vendor/js/videojs/videojs-playlist.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('js/video_player.js')}}" type="text/javascript"></script>
@endpush

@endsection
