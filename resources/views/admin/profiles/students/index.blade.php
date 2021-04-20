@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pt-3">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Students</h4></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Names</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $key => $student)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.student.profile.show', $student) }}" style="text-decoration: none;">
                                                {{ \App\Models\User::where('id', $student->user_id)->firstOrFail()->name }}
                                            </a>
                                        </td>
                                        <td>{{ \App\Models\User::where('id', $student->user_id)->firstOrFail()->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ \App\Models\Year::where('id', $student->year_id)->firstOrFail()->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No teachers</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
