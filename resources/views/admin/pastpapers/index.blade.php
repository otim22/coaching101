@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Past papers</h4></div>
                            <div>
                                <a type="button" href="{{ route('admin.pastpapers.create') }}" class="btn btn-primary pt-1" name="button">Create Pastpaper</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pastpapers as $pastpaper)
                                <tr>
                                    <th scope="row">{{ $pastpaper->created_at->diffForHumans() }}</th>
                                    <td>
                                        <a href="{{ route('admin.pastpapers.show', $pastpaper) }}" style="text-decoration: none;">{{ $pastpaper->title }}</a>
                                    </td>
                                    <td>
                                        @if($pastpaper->is_approved)
                                            <div class="badge badge-success">Approved</div>
                                        @else
                                            <div class="badge badge-warning">Pending</div>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No available pastpapers</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $pastpapers->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
