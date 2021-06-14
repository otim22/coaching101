@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('student.notes.index') }}" style="text-decoration:none;">Notes</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{ $note->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="mb-4">
                    <h5>
                        <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.notes.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Back
                        </a>
                    </h5>
                </div>
            </div>
        </div>
        @if($note->isSubscribedTo)
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 offset-1">
                    <h5 class="mb-4">{{ $note->title }}</h5>
                    @if($note->creator)
                        <embed src="{{ $note->getFirstMediaUrl('notes') }}" type="application/pdf" width="1000" height="800" frameborder="0" allowfullscreen>
                    @endif
                </div>
                <div class="col-sm-12 col-md-12 col-lg-10 offset-1 mt-5 d-flex justify-content-between">
                    @if($note->creator)
                        <a id="round-button-2" class="btn btn-secondary btn-sm" href="{{ route('student.notes.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Back
                        </a>

                        <a href="{{ $note->getFirstMediaUrl('notes') }}" id="round-button-2"
                                        name="button"
                                        class="btn btn-primary btn-sm" target="_blank">
                                        Download notes
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-10">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="bold">{{ $note->title }}</h5>
                            @if($note->creator)
                            <p>By {{ $note->creator->name }}</p>
                            @endif
                            @if($note->price)
                                <span class="bold">UGX {{ $note->formatPrice }}/-</span>
                            @else
                                <span class="bold paid_color">Free</span>
                                @if($note->creator)
                                    <embed src="{{ $note->getFirstMediaUrl('pastpapers') }}" type="application/pdf" width="100%" height="600" frameborder="0" allowfullscreen>
                                @endif
                            @endif
                            <div class="mb-3 mt-4">
                                <h5 class="bold">Notes objectives </h5>
                                @if($note->book_objective)
                                    @foreach($note->notes_objective as $note_objective)
                                    <p>
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                        </svg>
                                        {{ $note_objective }}
                                    </p>
                                    @endforeach
                                @else
                                    <p>No data</p>
                                @endif
                            </div>
                            <div class="mt-4">
                                <livewire:buy-note :note="$note" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="bg-gray-2">
    @include('partials.categories')
</section>

@endsection
