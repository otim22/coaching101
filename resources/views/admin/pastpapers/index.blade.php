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
                                <a type="button" href="{{ route('admin.pastpapers.create') }}" class="btn btn-primary pt-1" name="button">Upload Pastpaper</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($pastpapers as $pastpaper)
                            <h5 class="mb-2">
                                <a href="{{ route('admin.pastpapers.show', $pastpaper) }}" style="text-decoration: none;">
                                    {{ Str::ucfirst($pastpaper->title) }}
                                </a>
                            </h5>
                        @empty
                            <p class="mb-2">No available pastpapers</p>
                        @endforelse
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
