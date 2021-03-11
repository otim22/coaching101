@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h2>Notes</h2></div>
                            <div>
                                <a type="button" href="{{ route('admin.notes.index') }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.notes.update', $note) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group mb-4">
                                <label for="year_id" class="bold">Subject</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="category_id">
                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ old('name', $category->id) }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="year_id" class="bold">Year</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="year_id">
                                        <option selected value="{{ $year->id }}">{{ $year->name }}</option>
                                        @foreach($years as $year)
                                            <option value="{{ old('name', $year->id) }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('year_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="year_id" class="bold">Term</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="term_id">
                                        <option selected value="{{ $term->id }}">{{ $term->name }}</option>
                                        @foreach($terms as $term)
                                            <option value="{{ old('name', $term->id) }}">{{ $term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('term_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="title">Pastpaper title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $note->title) }}">
                                @error('title')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-group dynamic_note_objective">
                                    <label for="notes_objective">What will students learn in the note?</label>
                                    <p class="mt-2">Current note objectives</p>
                                    @foreach($note->notes_objective as $note_objective)
                                        <p><i class="material-icons material-icons_custommd-14 align-middle">navigate_next</i><span class="align-middle">{{ $note_objective }}</span></p>
                                    @endforeach
                                    <small class="form-text text-muted">
                                        <p class="red_color"><strong>*</strong> Adding new information will override all current note objectives. Be sure you include current ones you don't want to loose.</p>
                                    </small>
                                    <div class="input-group note_objective_section">
                                        <div class="notes_objective_input">
                                            <input type="text"
                                                id="notes_objective"
                                                value="{{old('notes_objective.0')}}"
                                                class="form-control form-control mb-2 @error('notes_objective.0') is-invalid @enderror"
                                                placeholder="Example: Origin of languages"
                                                name="notes_objective[]">
                                        </div>
                                        <div class="hidden" id="hidden_note_objective">
                                            <p class="delete_note_objective">x</p>
                                        </div>
                                    </div>
                                    @error('notes_objective.0')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <p class="btn_notes_objective hidden" type="button">
                                    <span><i class="material-icons material-icons_custommd-14 align-middle">add_circle_outline</i><span class="pl-1 align-middle">Add answer</span></span>
                                </p>
                            </div>

                            <div class="form-group mb-4">
                                <p class="bold">Current note</p>
                                <p style="color: #3864ab; font-weight: bold;">{{ $note->getFirstMedia('note')->file_name }}</p>
                                <p><small style="color: red; font-weight: bold;">*Choosing another file replaces this current one</small></p>

                                <label for="note" class="bold">Upload Notes</label>
                                <input type="file" name="note" class="form-control-file @error('note') is-invalid @enderror" id="note">
                                @error('note')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="price" class="bold">Notes price</label>
                                <div class="input-group mb-2">
                                    <input type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                id="price"
                                                placeholder="Example price: 10000"
                                                aria-label="Enter subject price"
                                                aria-describedby="price"
                                                name="price"
                                                value="{{ old('price', $note->price) }}">
                                </div>
                                <p><small style="color: red; font-weight: bold;">*Price should be only digits</small></p>
                                @error('price')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/notes.js')}}" type="text/javascript"></script>
@endpush

@prepend('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
@endprepend
