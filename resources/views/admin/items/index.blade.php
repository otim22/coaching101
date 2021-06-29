@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Items</h4></div>
                            <div>
                              <a type="button" href="{{ route('admin.items.create') }}" class="btn btn-primary pt-1" name="button">Create item</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Names</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $key => $item)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ route('admin.items.show', $item) }}" style="text-decoration: none;">{{ $item->name }}</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No available items</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
