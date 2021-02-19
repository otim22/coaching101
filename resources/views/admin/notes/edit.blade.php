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
                                <label for="price" class="bold">Pastpaper price</label>
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

                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
