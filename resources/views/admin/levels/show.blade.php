@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a type="button" href="{{ route('admin.levels.index') }}" class="btn btn-secondary" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a href="{{ route('admin.levels.edit', $level) }}" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                      Action
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ route('admin.levels.edit', $level) }}" class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="#"
                                                   onclick="event.preventDefault(); document.getElementById('delete-level-item').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2>{{ $level->name }}</h2>
                            </div>
                            <div>
                                <span class="badge badge-pill badge-info">{{ $level->standard->name }}</span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.levels.destroy', $level) }}" class="hidden" id="delete-level-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
