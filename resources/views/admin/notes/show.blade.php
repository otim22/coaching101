@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a type="button" href="{{ route('admin.notes.index') }}" class="btn btn-secondary" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a href="{{ route('admin.notes.edit', $note) }}" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <form action="{{route('admin.notes.approve', $note)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item"> Approve </button>
                                                </form>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.notes.edit', $note) }}" class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="#"
                                                   onclick="event.preventDefault(); document.getElementById('delete-book-item').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>{{ $note->title }}</h4>
                        <p>{{ $note->year->name }} {{ $note->category->name }}, {{ $note->term->name }}. </p>

                        @if($note->creator)
                            <p style="color: #3864ab; font-weight: bold;">{{ $note->getFirstMedia('teacher_note')->file_name }}</p>
                        @else
                            <p style="color: #3864ab; font-weight: bold;">{{ $note->getFirstMedia('note')->file_name }}</p>
                        @endif

                        @if($note->price)
                            <div class="mb-3">
                                <span class="mt-3">UGX {{ number_format($note->price) }}/-</span>
                            </div>
                        @else
                            <div class="mb-3">
                                <span class="mt-3" style="font-weight: bold;">Free</span>
                            </div>
                        @endif

                        <div class="mb-3">
                            <h4 class="bold">Notes objectives </h4>
                            @foreach($note->notes_objective as $note_objective)
                            <p><i class="material-icons material-icons_custommd-14 align-middle">navigate_next</i><span class="align-middle">{{ $note_objective }}</span></p>
                            @endforeach
                        </div>

                        @if(Auth::user()->role == 4)
                            @if($note->creator)
                                <a class="btn btn-secondary btn-sm float-right mt-3" href="{{ $note->getFirstMediaUrl('teacher_note') }}" target="_blank">
                                    Download notes here
                                </a>
                            @else
                                <a class="btn btn-secondary btn-sm float-right mt-3" href="{{ $note->getFirstMediaUrl('note') }}" target="_blank">
                                    Download notes here
                                </a>
                            @endif
                        @endif
                    </div>
                    <form action="{{ route('admin.notes.destroy', $note) }}" class="hidden" id="delete-book-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
