@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Notes</h4></div>
                            <div>
                                <a type="button" href="{{ route('admin.notes.create') }}" class="btn btn-primary pt-1" name="button">Upload Note</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Dates</th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($notes as $note)
                                <tr>
                                    <th scope="row">{{ $note->created_at->diffForHumans() }}</th>
                                    <td>
                                        <a href="{{ route('admin.notes.show', $note) }}" style="text-decoration: none;">{{ $note->title }}</a>
                                    </td>
                                    <td>
                                        @if($note->is_approved)
                                            <div class="badge badge-success">Approved</div>
                                        @else
                                            <div class="badge badge-warning">Pending</div>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <p class="mb-2">No available notes</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $notes->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
