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
                                <h2>Menu</h2>
                            </div>
                            <div>
                                <a type="button" href="{{ url()->previous() }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            id="name"
                                            value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="standard_id">Standard</label>
                                <div>
                                    @foreach($standards as $standard)
                                        <div class="mb-2">
                                            <input type="checkbox" class="mr-1"
                                                        name="standard_id[]" value="{{ $standard->id }}"  @if(in_array($standard->id, $setStandards))checked="checked"@endif>
                                            <label for="{{ $standard->id }}">{{ $standard->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('standard_id.*')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
