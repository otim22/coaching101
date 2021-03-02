@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Teacher</h4></div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Names</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teachers as $key => $teacher)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ Str::ucfirst($teacher->name) }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>@mdo</td>
                            </tr>
                            @empty
                                <p class="mb-2">No teachers</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
