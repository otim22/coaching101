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
                                <h2>{{ $menu->name }}</h2>
                            </div>
                            <div>
                                <a type="button" href="{{ route('admin.menus.index') }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" id="title"
                                            value="{{ old('title', $menu->title) }}">
                                @error('title')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="parent">Parent <small>(Optional. Select where above content belongs)</small></label>
                                <select class="form-control" name="parent_id">
                                    <option selected disabled>Select Parent Menu</option>
                                    @foreach($allMenus as $key => $value)
                                       <option value="{{ $key }}">{{ $value}}</option>
                                    @endforeach
                                 </select>
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
