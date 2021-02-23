@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active wraps-text" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">Account security</a>
                    <a class="nav-link wraps-text" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile setting</a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <div class="card  p-2">
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <label for="name">Full names</label>
                                        <input type="text" readonly class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}">
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="email">Email</label>
                                        <input type="email" readonly class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @if(!$user->profile->hasProfileUpdated)
                            <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if($user->role == 2)
                                    <div class="card  p-2">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="category_id">Subject you teach *</label>
                                                <select class="custom-select" name="category_id">
                                                    <option selected>All subjects</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="school">School where you teach <small>(*Optional)</small></label>
                                                <input type="text" name="school" class="form-control @error('profile') is-invalid @enderror" id="profile" placeholder="Example: St. Mary's college lugazi">
                                                @error('profile')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="bio">Your brief biography <small>(< 25 words)</small></label>
                                                <textarea type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3"></textarea>
                                                @error('bio')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="profile_picture">Your profile picture</label>
                                                <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" id="profile_picture">
                                                @error('profile_picture')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block mt-5">Save</button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        @else
                            <div class="card">
                                <div class="card-header">
                                    <button id="round-button-2" type="button" name="button" class="btn btn-secondary btn-sm edit-btn float-right" data-target="#staticBackdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908l-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
                                            <path fill-rule="evenodd" d="M2.832 13.228L8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
                                        </svg>
                                        Edit profile
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5>{{ ucfirst($user->profile->school) }}</h5>
                                    <p class="sub-text">{{ $subject->name }}</p>
                                    <p class="author-font">{{ $user->profile->bio }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="modal-body">
                                        @if($user->role == 2)
                                            <div class="form-group">
                                                <label for="category_id">Subject you teach *</label>
                                                <select class="custom-select" name="category_id">
                                                    <option selected>All subjects</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="school">School where you teach <small>(*Optional)</small></label>
                                                <input type="text" name="school" class="form-control @error('profile') is-invalid @enderror" id="profile" placeholder="Example: St. Mary's college lugazi">
                                                @error('profile')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="bio">Your brief biography <small>(< 25 words)</small></label>
                                                <textarea type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3"></textarea>
                                                @error('bio')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="profile_picture">Your profile picture</label>
                                                <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" id="profile_picture">
                                                @error('profile_picture')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button id="round-button-2" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button id="round-button-2" type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/profile.js')}}" type="text/javascript"></script>
@endpush
