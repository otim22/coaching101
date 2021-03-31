@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4 class="pt-1">Students list</h4></div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                    <td><a href="{{ route('admin.students.show', $student) }}" style="text-decoration: none;">{{ Str::ucfirst($student->name) }}</a></td>
                                    <td><a href="{{ route('admin.students.show', $student) }}" style="text-decoration: none;">{{ $student->email }}</a></td>
                                    <td class="align-middle" style="width:40px">
                                        @if(Auth::user()->role == 4)
                                            <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons md-18 align-middle">more_vert</i>
                                            </a>

                                            <div class="dropdown-menu">
                                                <form action="{{ route('admin.admins.approve', $student) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item"> Approve </button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#"
                                                    onclick="event.preventDefault(); document.getElementById('delete-student-{{ $student->id }}').submit();">
                                                    <span class="align-middle">Delete</span>
                                                </a>
                                            </div>
                                        @endif
                                    </td>
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
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
