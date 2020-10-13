@extends('layouts.app')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center  pl-5 pr-5">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                <video id="player" controls loop preload="auto"  width="100%" data-setup="{}" controlslist="nodownload">
                    <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                </video>

                <div class="mt-5">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">Description</a>
                        <a class="nav-link" id="nav-resource-tab" data-toggle="tab" href="#nav-resource" role="tab" aria-controls="nav-resource" aria-selected="false">Extra resources</a>
                        <a class="nav-link" id="nav-rate-tab" data-toggle="tab" href="#nav-rate" role="tab" aria-controls="nav-rate" aria-selected="false">Rate us!</a>
                      </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                            <div class="mt-3">
                                <p>{{ $topic->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-resource" role="tabpanel" aria-labelledby="nav-resource-tab">
                            <div class="mt-3">
                                <ul>
                                    @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                    <li class="mb-2">
                                        <svg width="1.4em" height="1.4em" viewBox="0 0 16 22" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                            <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                        </svg>
                                        <a target="_blank" href="{{ $topicMedia->getUrl() }}" style="text-decoration: none">{{ $topicMedia->name }}</a>
                                    </li>
                                    @empty
                                    <p>No available attachments.</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-rate" role="tabpanel" aria-labelledby="nav-rate-tab">
                            <div class="mt-3">
                                Rate us!!
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
                            @forelse($subject->topics as $key => $topic)
                            <div class="card-header" id="{{ $topic->id }}">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $topic->id }}" aria-expanded="true" aria-controls="collapse{{ $topic->id }}" style="text-decoration: none">
                                    Topic {{ $key+1 }}: {{ $topic->title }}
                                </button>
                              </h2>
                            </div>

                            <div id="collapse{{ $topic->id }}" class="collapse {{ $topic->id === 1 ? 'show' : '' }}" aria-labelledby="{{ $topic->id }}" data-parent="#accordionExample">
                              <div class="card-body">
                                  <ul>
                                      @forelse($topic->getMedia('content_file') as $topicMedia)
                                      <li class="mb-3">
                                          <svg width="1.3em" height="1.3em" viewBox="0 0 16 20" class="bi bi-file-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM6 5.883v4.234a.5.5 0 0 0 .757.429l3.528-2.117a.5.5 0 0 0 0-.858L6.757 5.454a.5.5 0 0 0-.757.43z"/>
                                          </svg>
                                          <a href="{{ route('subject.play_video', [$subject, $topic]) }}" style="text-decoration: none">{{ $key+1 }}. {{ $topicMedia->name }}</a>
                                      </li>
                                      @empty
                                      <p>No available attachments.</p>
                                      @endforelse

                                      @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                      <li class="mb-2">
                                          <svg width="1.4em" height="1.4em" viewBox="0 0 16 22" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                              <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                          </svg>
                                          <a target="_blank" href="{{ $topicMedia->getUrl() }}" style="text-decoration: none">{{ $topicMedia->name }}</a>
                                      </li>
                                      @empty
                                      <p>No available attachments.</p>
                                      @endforelse
                                  </ul>
                              </div>
                            </div>
                            @empty
                            <p>No topics available yet!</p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-8">

            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('js/play_video.js')}}" type="text/javascript"></script>
@endpush

@endsection
