@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Video Subjects</h4></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Status</th>
                                    @if(Auth::user()->hasRole('super-admin'))
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subjects as $subject)
                                <tr>
                                    <th scope="row">{{ $subject->created_at->diffForHumans() }}</th>
                                    <td><a href="{{ route('admin.subjects.show', $subject) }}" style="text-decoration: none;">{{ $subject->title }}</a></td>
                                    <td>
                                        @if($subject->is_approved)
                                            <div class="badge badge-success">Approved</div>
                                        @else
                                            <div class="badge badge-warning">Pending</div>
                                        @endif
                                    </td>
                                    @if(Auth::user()->hasRole('super-admin'))
                                        <td>
                                            <a class="btn btn-outline-danger"
                                                        href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-subject-{{ $subject->id }}').submit();">
                                                        {{ __('Delete') }}
                                            </a>
                                        </td>
                                    @endif
                                    <form action="{{ route('admin.subjects.destroy', $subject) }}" class="hidden" id="delete-subject-{{ $subject->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </tr>
                                @empty
                                <tr>
                                    <td>No available subjects</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
