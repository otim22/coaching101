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
                @if(auth()->user()->hasRole('student'))
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                    </li>
                @elseif(auth()->user()->hasRole('teacher'))
                    <li class="breadcrumb-item">
                        <a href="{{ route('manage.subjects') }}" style="text-decoration: none;">Dashboard</a>
                    </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</section>

<div class="container">
    @include('flash.messages')
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active wraps-text" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">Account security</a>
                    <a class="nav-link wraps-text" id="settings-tab" data-toggle="pill" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Profile setting</a>
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

                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        @if($user->profile)
                            @if(auth()->user()->hasRole('student'))
                                <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                        <div class="card  p-2">
                                            <div class="card-body">
                                                <div class="text-center mb-4">
                                                    <img src="{{ $user->profile->getFirstMediaUrl('profile') }}" alt="{{ $user->name }}" class="rounded-circle" width="100" height="100">
                                                </div>
                                                <div class="form-group">
                                                    <label for="school" class="bold">Your school</label>
                                                    <input type="text" name="school" class="form-control @error('profile') is-invalid @enderror" value="{{ $user->profile->school }}">
                                                    @error('school')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="year_id" class="bold">Current class</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" name="year_id">
                                                            <option selected value="{{ $year->id }}">{{ $year->name }}</option>
                                                            @foreach($years as $year)
                                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('year_id')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone" class="bold">Telephone number</label>
                                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->profile->phone }}">
                                                    @error('phone')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="dob" class="bold">Date of Birth (DOB)</label>
                                                    <input type="text" name="dob" class="form-control @error('profile') is-invalid @enderror" value="{{ $user->profile->dob }}">
                                                    @error('dob')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="profile_picture" class="bold">Profile picture</label>
                                                    <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture">
                                                    @error('profile_picture')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <button id="round-button-2" type="submit" class="btn btn-primary btn-block mt-5">Update</button>
                                            </div>
                                        </div>
                                </form>
                            @elseif(auth()->user()->hasRole('teacher'))
                                <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                        <div class="card  p-2">
                                            <div class="card-body">
                                                <div class="text-center mb-4">
                                                    <img src="{{ $user->profile->getFirstMediaUrl('profile') }}" alt="{{ $user->name }}" class="rounded-circle" width="100" height="100">
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id" class="bold">Subject you teach *</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" name="category_id">
                                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('category_id')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="school" class="bold">School you teach at <small>(Optional)</small></label>
                                                    <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" value="{{ $user->profile->school }}">
                                                    @error('school')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone" class="bold">Telephone number</label>
                                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="profile" value="{{ $user->profile->phone }}">
                                                    @error('phone')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="bio" class="bold">Your brief biography <small>(< 25 words)</small></label>
                                                    <textarea type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3">{{ $user->profile->bio }}</textarea>
                                                    @error('bio')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="profile_picture" class="bold">Profile picture</label>
                                                    <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" id="profile_picture">
                                                    @error('profile_picture')
                                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <button id="round-button-2" type="submit" class="btn btn-primary btn-block mt-5">Update</button>
                                            </div>
                                        </div>
                                </form>
                            @endif
                        @else
                            @if(auth()->user()->hasRole('student'))
                            <form action="{{ route('users.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="card  p-2">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="school" class="bold">Your school </label>
                                                <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" value="{{ old('school') }}" required>
                                                @error('profile')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="year_id" class="bold">Current class</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" name="year_id" required>
                                                        <option selected>All classes</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" {{ old('year_id', $year->id) == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('year_id')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="bold">Telephone number</label>
                                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Example: 0706100000" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="dob" class="bold">Date of Birth (DOB)</label>
                                                <input type="date" name="dob" max="3000-12-31" min="1000-01-01" class="form-control" value="{{ old('dob') }}">
                                                @error('dob')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="profile_picture" class="bold">Profile picture</label>
                                                <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture">
                                                @error('profile_picture')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block mt-5">Save</button>
                                        </div>
                                    </div>
                                </form>
                            @elseif(auth()->user()->hasRole('teacher'))
                            <form action="{{ route('users.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="card  p-2">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="category_id" class="bold">Subject you teach *</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" name="category_id" required>
                                                        <option selected>All subjects</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ old('category_id', $category->id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('category_id')
                                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="school" class="bold">School you teach at <small> (Optional)</small></label>
                                                <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" value="{{ old('school') }}">
                                                @error('profile')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="bold">Telephone number<small>(Optional)</small></label>
                                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="bio" class="bold">Your brief biography <small>(< 25 words)</small></label>
                                                <textarea type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="3" required>{{ old('bio') }}</textarea>
                                                @error('bio')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="profile_picture" class="bold">Profile picture</label>
                                                <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" required>
                                                @error('profile_picture')
                                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block mt-5">Save</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2">
    @include('partials.categories')
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/profile.js')}}" type="text/javascript"></script>
@endpush
