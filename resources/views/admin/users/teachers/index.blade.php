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
                                @forelse($teachers as $key => $teacher)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td><a href="{{ route('admin.teachers.show', $teacher) }}" style="text-decoration: none;"> {{ Str::ucfirst($teacher->name) }}</a></td>
                                    <td><a href="{{ route('admin.teachers.show', $teacher) }}" style="text-decoration: none;">{{ $teacher->email }}</a></td>
                                    @if(Auth::user()->role == 4)
                                    <td>
                                        <a class="btn btn-outline-danger"
                                        href="#"
                                        onclick="event.preventDefault(); document.getElementById('delete-teacher-{{ $teacher->id }}').submit();">
                                        {{ __('Delete') }}
                                    </a>
                                </td>
                                @endif
                                <form action="{{ route('admin.teachers.destroy', $teacher) }}" class="hidden" id="delete-teacher-{{ $teacher->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </tr>
                            @empty
                            <p class="mb-2">No teachers</p>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Confirm Deletion Modal -->
                    <div class="modal fade" id="staticBackdrop{{ $teacher->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title bold" id="staticBackdropLabel">Are you sure?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you really want to delete this user? This process will delete the user and cannot be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm mr-4" data-dismiss="modal">Cancel</button>
                                    {!! Form::open(['route' => ['admin.teachers.destroy', $teacher], 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-primary btn-sm">Understood</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
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
