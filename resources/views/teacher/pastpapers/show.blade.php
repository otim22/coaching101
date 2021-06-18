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
                    <a href="{{ route('manage.subjects') }}" style="text-decoration: none;">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('teacher.pastpapers') }}" style="text-decoration: none;">Past paper</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{$pastpaper->title}}
                </li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="fast-transition">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.pastpapers') }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Back
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subPastpapers.create', $pastpaper)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 20 20">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z"/>
                                </svg>
                                Upload question
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subPastpaperAnswers.create', $pastpaper)}}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-journal-richtext" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm1.639-4.208l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM6.75 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                                </svg>
                                Upload answer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pastpapers.edit', $pastpaper) }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Edit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a type="button" class="nav-link" href="#" data-toggle="modal" data-target="#deletePastpapers">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" fill="currentColor" class="bi bi-trash" viewBox="0 0 18 18">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                Delete
                            </a>
                        </li>
                        <li class="nav-item">
                            <a type="button" data-toggle="tooltip" data-placement="right" title="Break and upload past paper into small modules to make a full past paper package.">
                                <span class="badge badge-pill badge-primary">Upload pastpaper in small modules</span>
                            </a>
                        </li>
                        <hr>
                        <div class="ml-3">
                            <li class="nav-item">
                                <p>{{ $pastpaper->standard->name }}</p>
                            </li>
                            <li class="nav-item">
                                <p>{{ $pastpaper->category->name }}</p>
                            </li>
                            <li class="nav-item">
                                <p>{{ $pastpaper->year->name }}</p>
                            </li>
                            <li class="nav-item">
                                <p>{{ $pastpaper->term->name }}</p>
                            </li>
                            <li class="nav-item">
                                @if(!$pastpaper->price)
                                <p>Free</p>
                                @else
                                <p>UGX {{ $pastpaper->formatPrice }}/-</p>
                                @endif
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 adds-padding upper-padding">
                <h5 class="bold mb-3">{{ $pastpaper->title }}</h5>
                <div class="mb-3">
                    <p class="bold">Past paper objectives </p>
                    <ul>
                        @forelse($pastpaper->objective as $pastpapers_objective)
                            <li class="mb-1">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-check mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                </svg>
                                {{ $pastpapers_objective }}
                            </li>
                        @empty
                            <p>No objectives</p>
                        @endforelse
                    </ul>
                </div>
                <div class="mb-3">
                    <p class="bold">All past paper below </p>
                    <ul>
                        @forelse($pastpaper->subpastpapers as $subpastpaper)
                            @if($subpastpaper->parent_id == null)
                                <a class="mb-1" href="{{ route('subPastpapers.show', [$pastpaper, $subpastpaper]) }}" style="text-decoration: none;">
                                    <li class="mb-1">
                                    {{ $subpastpaper->title }}
                                    </li>
                                <a>
                            @endif
                            @if($subpastpaper->parent_id != null)
                                <a href="{{ route('subPastpaperAnswers.show', [$pastpaper, $subpastpaper]) }}" style="text-decoration: none;">
                                    <li class="mb-2">
                                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-check mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                        </svg>
                                        {{ $subpastpaper->title }}
                                    </li>
                                <a>
                            @endif
                        @empty
                            <p>No past paper</p>
                        @endforelse
                    </ul>
                </div>
            </div>
            <form action="{{ route('pastpapers.destroy', $pastpaper) }}" class="hidden" id="delete-teacher-subpastpaper" method="POST">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>

    <div class="modal fade" id="deletePastpapers" tabindex="-1" aria-labelledby="deletePastpapersLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePastpapersLabel">{{ $pastpaper->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete these past paper?
                </div>
                <div class="modal-footer">
                    <button  id="round-button-2" type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button  id="round-button-2" type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-teacher-subpastpaper').submit();">Delete</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
