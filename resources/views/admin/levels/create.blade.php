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
                                <h2>Level</h2>
                            </div>
                            <div>
                                <a type="button" href="{{ route('admin.levels.index') }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.levels.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Standard</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="standard_id">
                                        <option>Choose Standard...</option>
                                        @foreach($standards as $standard)
                                            <option value="{{ $standard->id }}" {{ old('standard_id', $standard->id) == $standard->id ? 'selected' : '' }}>{{ $standard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('standard_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
