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
                                <h4>Subjects</h4>
                            </div>
                            <div>
                                <a type="button" href="{{ route('admin.categories.create') }}" class="btn btn-primary pt-1" name="button">Create Subject</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($categories as $category)
                            <h5 class="mb-2">
                                <a href="{{ route('admin.categories.show', $category) }}" style="text-decoration: none;">
                                    <i class="material-icons material-icons_custom">navigate_next</i>{{ $category->name }}
                                </a>
                            </h5>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
