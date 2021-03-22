@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pt-3">
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
                                <th scope="col">School</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Bio</th>
                                <th scope="col">Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teachers as $key => $teacher)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ \App\Models\User::where('id', $teacher->user_id)->firstOrFail()->name }}</td>
                                    <td>{{ $teacher->school }}</td>
                                    <td>{{ \App\Models\User::where('id', $teacher->user_id)->firstOrFail()->email }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td>{{ $teacher->bio }}</td>
                                    <td>{{ \App\Models\Category::where('id', $teacher->category_id)->firstOrFail()->name }}</td>
                                </tr>
                            @empty
                                <tr class="d-flex justify-content-center">
                                    <td>No teachers</td>
                                </tr>
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
