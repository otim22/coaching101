@extends('layouts.app')

@section('content')

<section class="bg-gray-2 section-one mt-4" id="teacher-classses">
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
                <li class="breadcrumb-item active" aria-current="page">{{ Str::ucfirst($teacher->name) }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-7 mb-5">
                <h3 class="bold mt-5">{{ Str::ucfirst($teacher->name) }}</h3>
                @if($teacher->profile)
                    <p class="sub-text">
                            {{ \App\Models\Category::where('id', $teacher->profile->category_id)->firstOrFail()->name }} teacher
                            at {{ $teacher->profile->school }}
                    </p>
                    <p class="author-text">{{ $teacher->profile->bio }}</p>
                @endif
                <a id="round-button-2" type="button" href="#section-teacher_course" class="btn btn-primary teacher-classses_button mt-4">Explore my classes</a>
            </div>
            @if($teacher->profile)
                <div class="col-sm-12 col-md-12 col-lg-5 pt-4">
                    <img src="{{ asset($teacher->profile->getFirstMediaUrl('profile')) }}" class="circlar-teacher" width="150" height="100" alt="{{ $teacher->name }}">
                </div>
            @else
                <div class="col-sm-12 col-md-12 col-lg-5 pt-4">
                    <img src="#" class="circlar-teacher" width="150" height="100" alt="{{ $teacher->name }}">
                </div>
            @endif
        </div>
    </div>
</section>

<section id="section-teacher_course">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5 class="bold mb-4">Subject videos</h5>
            </div>
            @forelse($subjects as $subject)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mb-4">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                            <img src="{{ $subject->cover_image }}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $subject->very_short_title }}</span><br />
                                <span class="author-font">{{$subject->creator->name }}</span><br />
                                @if($subject->averageRating)
                                    <div class="star-display">
                                        @for($i = $subject->averageRating; $i >= 1; $i--)
                                            <label for="rate-{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        @if($subject->isSubscribedTo)
                                            <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span>
                                        @endif
                                    </div>
                                @else
                                    <div class="rating">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        @endfor
                                        @if($subject->isSubscribedTo)
                                            <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span>
                                        @endif
                                    </div>
                                @endif

                                @if($subject->price)
                                    <span class="bold">UGX {{  rtrim(rtrim(number_format($subject->price, 2), 2), '.') }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                            <div class="mt-2 d-flex justify-content-between">
                                <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                <p>Sorry, no available subjects in this category!</p>
            </div>
            @endforelse
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mt-4">
                <p>{{ $subjects->links() }}</p>
            </div>
        </div>
    </div>
</section>

<section class="{{ (count($books) == 0) ? 'hide-me' : 'bg-white' }}">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5 class="bold mb-4">Books</h5>
            </div>
            @forelse($books as $book)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                    <div class="mb-3">
                        <div class="card">
                            @if($book->isSubscribedTo)
                                <a href="{{ route('student.books.show', $book) }}" style="text-decoration: none">
                                    @if($book->creator)
                                        <img src="{{ $book->getFirstMediaUrl('teacher_cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="150">
                                    @else
                                        <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="150">
                                    @endif
                                </a>
                            @elseif(!$book->price)
                                <a href="{{ route('student.books.show', $book) }}" style="text-decoration: none">
                                    @if($book->creator)
                                        <img src="{{ $book->getFirstMediaUrl('teacher_cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="150">
                                    @else
                                        <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="150">
                                    @endif
                                </a>
                            @else
                                @if($book->creator)
                                    <img src="{{ $book->getFirstMediaUrl('teacher_cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="150">
                                @else
                                    <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="150">
                                @endif
                            @endif
                            <div class="card-body">
                                @if($book->isSubscribedTo)
                                    <a href="{{ route('student.books.show', $book) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $book->very_short_title }}</span><br />
                                        @if($book->creator)
                                            <span class="author-font">{{ $book->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                        @endif

                                        @if($book->price)
                                            UGX {{ rtrim(rtrim(number_format($book->price, 2), 2), '.') }}/- <span class="author-font">(Paid)</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                @elseif(!$book->price)
                                    <a href="{{ route('student.books.show', $book) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $book->very_short_title }}</span><br />
                                        @if($book->creator)
                                            <span class="author-font">{{ $book->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                        @endif

                                        @if($book->price)
                                            <span class="bold">UGX {{ rtrim(rtrim(number_format($book->price, 2), 2), '.') }}/-</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                @else
                                    <span class="bold">{{ $book->very_short_title }}</span><br />
                                    @if($book->creator)
                                        <span class="author-font">{{ $book->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($book->price)
                                        <span class="bold">UGX {{ rtrim(rtrim(number_format($book->price, 2), 2), '.') }}/-</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                @endif
                                <div class="mt-2">
                                    <livewire:buy-book :book="$book" :key="$book->id" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
                    <p>The book(s) you are looking for was not found. </p>
                </div>
            @endforelse
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</section>

<section class="{{ (count($notes) == 0) ? 'hide-me' : '' }}">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5 class="bold mb-4">Notes</h5>
            </div>
            @forelse($notes as $note)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                @if($note->isSubscribedTo)
                                    <a href="{{ route('student.notes.show', $note) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $note->very_short_title }}</span><br />
                                        @if($note->creator)
                                            <span class="author-font">{{ $note->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                        @endif

                                        @if($note->price)
                                            UGX {{ rtrim(rtrim(number_format($note->price, 2), 2), '.') }}/- <span class="author-font">(Paid)</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                @elseif(!$note->price)
                                    <a href="{{ route('student.notes.show', $note) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $note->very_short_title }}</span><br />
                                        @if($note->creator)
                                            <span class="author-font">{{ $note->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                        @endif

                                        @if($note->price)
                                            UGX {{ rtrim(rtrim(number_format($note->price, 2), 2), '.') }}/- <span class="author-font">(Paid)</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                @else
                                    <span class="bold">{{ $note->very_short_title }}</span><br />
                                    @if($note->creator)
                                        <span class="author-font">{{ $note->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($note->price)
                                        <span class="bold">UGX {{ rtrim(rtrim(number_format($note->price, 2), 2), '.') }}/-</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                @endif
                                <div class="mt-2">
                                    <livewire:buy-note :note="$note" :key="$note->id" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
                    <p>The note(s) you are looking for was not found. </p>
                </div>
            @endforelse
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                    {{ $notes->links() }}
                </div>
        </div>
    </div>
</section>

<section class="{{ (count($pastpapers) == 0) ? 'hide-me' : 'bg-white' }}">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5 class="bold mb-4">Past papers</h5>
            </div>
            @forelse($pastpapers as $pastpaper)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                @if($pastpaper->isSubscribedTo)
                                    <a href="{{ route('student.pastpapers.show', $pastpaper) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                        @if($pastpaper->creator)
                                            <span class="author-font">{{ $pastpaper->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                        @endif

                                        @if($pastpaper->price)
                                            UGX {{ rtrim(rtrim(number_format($pastpaper->price, 2), 2), '.') }}/- <span class="author-font">(Paid)</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                @elseif(!$pastpaper->price)
                                    <a href="{{ route('student.pastpapers.show', $pastpaper) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                        @if($pastpaper->creator)
                                            <span class="author-font">{{ $pastpaper->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                        @endif

                                        @if($pastpaper->price)
                                            UGX {{ rtrim(rtrim(number_format($pastpaper->price, 2), 2), '.') }}/- <span class="author-font">(Paid)</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                @else
                                    <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                    @if($pastpaper->creator)
                                        <span class="author-font">{{ $pastpaper->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">{{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($pastpaper->price)
                                        <span class="bold">UGX {{ rtrim(rtrim(number_format($pastpaper->price, 2), 2), '.') }}/-</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                @endif
                                <div class="mt-2">
                                    <livewire:buy-pastpaper :pastpaper="$pastpaper" :key="$pastpaper->id" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
                    <p>The pastpaper(s) you are looking for was not found. </p>
                </div>
            @endforelse
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                    {{ $pastpapers->links() }}
                </div>
        </div>
    </div>
</section>

<section class="bg-gray-2">
    @include('partials.categories')
</section>

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/teacher_courses.js')}}" type="text/javascript"></script>
@endpush

@endsection
