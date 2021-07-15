@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card  admin-shadow">
                    <div class="card-header">
                        <div class="float-right mb-1">
                            <a type="button" href="{{ route('admin.subjects.show', $subject) }}" class="btn btn-secondary" name="button">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <h5 class="bold mt-1">{{ $topic->title }}</h5>
                            <video controls preload="auto"  height="180" width="300" data-setup="{}" controlslist="nodownload">
                                <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                            </video>
                        </div>
                        <div>
                            <div class="mt-3">
                                <h5 class="bold">Topic description</h5>
                                <p>{{ $topic->description }}</p>
                            </div>

                            <div class="mt-3">
                                <h5 class="bold">Extra attachments</h5>
                                <ul>
                                    @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                        <li>
                                            {{ $topicMedia->name }}
                                        </li>
                                    @empty
                                    <p>No available attachments.</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
