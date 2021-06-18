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
                                <a type="button" href="{{ route('admin.pastpapers.index') }}" class="btn btn-secondary" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a href="{{ route('admin.pastpapers.edit', $pastpaper) }}" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <form action="{{route('admin.pastpapers.approve', $pastpaper)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item"> Approve </button>
                                                </form>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="#"
                                                   onclick="event.preventDefault(); document.getElementById('delete-book-item').submit();">
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
                        <h4>{{ $pastpaper->title }}</h4>
                        <p>{{ $pastpaper->category->name }}, {{ $pastpaper->year->name }}, {{ $pastpaper->term->name }}. </p>

                        @if($pastpaper->price)
                            <div class="mb-3">
                                <span>UGX {{ number_format($pastpaper->price) }}/-</span>
                            </div>
                        @else
                            <div class="mb-3">
                                <span style="font-weight: bold;">Free</span>
                            </div>
                        @endif

                        <div class="mb-3">
                            <h5 class="bold">Past paper objectives </h5>
                            @if($pastpaper->objective)
                                @foreach($pastpaper->objective as $pastpaper_objective)
                                    <p><i class="material-icons material-icons_custommd-14 align-middle">navigate_next</i><span class="align-middle">{{ $pastpaper_objective }}</span></p>
                                @endforeach
                            @else
                                <p>No data</p>
                            @endif
                        </div>

                        <h5 class="bold">All past papers below </h5>
                        @forelse($pastpaper->subpastpapers as $subpastpaper)
                            @if($subpastpaper->parent_id == null)
                                <p>
                                    <span class="align-middle">{{ $subpastpaper->title }}</span>
                                </p>
                            @endif
                            @if($subpastpaper->parent_id != null)
                                <p>
                                    <i class="material-icons material-icons_custommd-14 align-middle">navigate_next</i>
                                    <span class="align-middle">{{ $subpastpaper->title }}</span>
                                </p>
                            @endif
                        @empty
                            <p>No past papers</p>
                        @endforelse

                        @if(Auth::user()->hasRole('super-admin'))
                            @if($pastpaper->creator)
                                <a class="btn btn-secondary btn-sm float-right mt-3" href="{{ $pastpaper->getFirstMediaUrl('teacher_pastpaper') }}" target="_blank">
                                    Download pastpaper here
                                </a>
                            @endif
                        @endif
                    </div>
                    <form action="{{ route('admin.pastpapers.destroy', $pastpaper) }}" class="hidden" id="delete-book-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
