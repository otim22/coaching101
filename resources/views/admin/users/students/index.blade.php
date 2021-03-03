@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Students</h4></div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Names</th>
                                <th scope="col">Email</th>
                                @if(Auth::user()->role == 4)
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $key => $student)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ Str::ucfirst($student->name) }}</td>
                                <td>{{ $student->email }}</td>
                                @if(Auth::user()->role == 4)
                                    <td>
                                        <a class="btn btn-outline-danger"
                                                    href="#"
                                                    onclick="event.preventDefault(); document.getElementById('delete-student-{{ $student->id }}').submit();">
                                                    {{ __('Delete') }}
                                        </a>
                                    </td>
                                @endif
                                <form action="{{ route('admin.students.destroy', $student) }}" class="hidden" id="delete-student-{{ $student->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </tr>
                            @empty
                                <p class="mb-2">No students</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
