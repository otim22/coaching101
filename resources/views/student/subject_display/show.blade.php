@extends('layouts.app')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center  pl-5 pr-5 mt-4">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                <livewire:video-player :topic="$topic" :key="$topic->id" />
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        @if (isset($previous))
                            <a id="round-button-2" class="btn btn-sm btn-secondary" href="{{ url('subjects/'. $subject->slug . '/topics/' . $previous->slug) }}" type="button" name="button" style="text-decoration: none">Previous lession</a>
                        @endif
                    </div>
                    <div>
                        @if (isset($next))
                            <a id="round-button-2" class="btn btn-sm btn-outline-secondary" href="{{ url('subjects/'. $subject->slug . '/topics/' . $next->slug) }}" type="button" class="" name="button" style="text-decoration: none">Next lession</a>
                        @endif
                    </div>
                </div>
                <div class="mt-5  pt-5">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active bold" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            <a class="nav-link bold" id="resource-tab" data-toggle="tab" href="#resource" role="tab" aria-controls="resource" aria-selected="false">Extra resources</a>
                            <a class="nav-link bold" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="false">Q&A</a>
                            <a class="nav-link bold" id="rate-tab" data-toggle="tab" href="#rate" role="tab" aria-controls="rate" aria-selected="false">Rate teacher</a>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="mt-4">
                                <h5 class="bold">Topic brief description</h5>
                                <p>{{ $topic->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="resource" role="tabpanel" aria-labelledby="resource-tab">
                            <div class="mt-4">
                                <h5 class="bold">Useful resources to help you</h5>
                                <ul>
                                    @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                        <li>
                                            <a target="_blank" href="{{ $topicMedia->getUrl() }}" style="text-decoration: none; color: #515152;">
                                                <p><i class="fa subject-icon fa-file "></i> {{ $topicMedia->name }}</p>
                                            </a>
                                        </li>
                                    @empty
                                        <p>No extra resource.</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                            <div class="mt-4">
                                <div id="displayed-questions" class="mb-3">
                                    @if(count($questions->where('item_content_id', $subject->id)))
                                        <h5 class="bold mb-4">All questions in this course ({{ \App\Models\Question::where('item_content_id', $subject->id)->count() }})</h5>
                                    @endif

                                    @foreach($questions as $question)
                                        @if($question->item_content_id == $subject->id)
                                            <p type="button" data-toggle="modal" data-target="#singleQuestion{{ $question->id }}" class="qtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                                {{ $question->body }}
                                            </p>

                                            <div class="modal fade" id="singleQuestion{{ $question->id }}" tabindex="-1" aria-labelledby="askingAQuestionLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="bold">{{ $question->body }}</p>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('student.subject_display.partials.replies')

                                                                @include('student.subject_display.partials.comment')
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <button id="round-button-2" type="button" class="btn btn-secondary btn-outline btn-sm mt-4" data-toggle="modal" data-target="#askingAQuestion">Ask a new question</button>
                                    <div class="mt-5">
                                        {{ $questions->links() }}
                                    </div>
                                </div>

                                <div class="modal fade" id="askingAQuestion" tabindex="-1" aria-labelledby="askingAQuestionLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            @include('student.subject_display.partials.question')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rate" role="tabpanel" aria-labelledby="rate-tab">
                            <div class="mt-4">
                                <livewire:rate-teacher :subject="$subject" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside>
                    <div class="accordion make-me-sticky mr-4 mb-5" id="accordionExample">
                        <div class="mb-3">
                            <h5 class="bold">Subject contents</h5>
                        </div>
                        <div class="card">
                            @foreach($subject->topics as $key => $topic)
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
                                    @foreach($topic->getMedia('content_file') as $topicMedia)
                                        <p class="remove_bottom_margin mb-3">
                                            <a href="{{ route('student.show', [$subject, $topic]) }}" style="text-decoration: none">
                                                <i class="fa subject-icon fa-play-circle"></i>{{ $topicMedia->name }}
                                            </a>
                                        </p>
                                    @endforeach

                                    @foreach($topic->getMedia('resource_attachment') as $topicMedia)
                                        <p class="remove_bottom_margin mb-3">
                                            <a target="_blank" href="{{ $topicMedia->getUrl() }}" style="text-decoration: none">
                                                <i class="fa subject-icon fa-file"></i>{{ $topicMedia->name }}
                                            </a>
                                        </p>
                                    @endforeach
                              </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/videojs/video.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('vendor/js/videojs/videojs-playlist.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('js/video_player.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
@endpush
