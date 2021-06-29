@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4 class="pt-1">Admins list</h4></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Email</th>
                                    @if(Auth::user()->hasRole('super-admin'))
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($admins as $key => $admin)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ Str::ucfirst($admin->name) }}</td>
                                    <td>{{ $admin->email }}</td>
                                    @if(Auth::user()->hasRole('super-admin'))
                                        <td>
                                            <a class="btn btn-outline-danger"
                                                        href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-admin-{{ $admin->id }}').submit();">
                                                        {{ __('Delete') }}
                                            </a>
                                        </td>
                                    @endif
                                    <form action="{{ route('admin.admins.destroy', $admin) }}" class="hidden" id="delete-admin-{{ $admin->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </tr>
                                @empty
                                    <p class="mb-2">No admins</p>
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
