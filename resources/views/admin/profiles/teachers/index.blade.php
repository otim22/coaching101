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
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Names</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teachers as $key => $teacher)
                                    <tr>
                                            <td>
                                                <a href="{{ route('admin.teacher.profile.show', $teacher) }}" style="text-decoration: none;">
                                                    {{ \App\Models\User::where('id', $teacher->user_id)->firstOrFail()->name }}
                                                </a>
                                            </td>
                                            <td>{{ \App\Models\Category::where('id', $teacher->category_id)->firstOrFail()->name }}</td>
                                            <td>{{ \App\Models\User::where('id', $teacher->user_id)->firstOrFail()->email }}</td>
                                            <td>{{ $teacher->phone }}</td>
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
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
