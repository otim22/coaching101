@include('flash.messages')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h5 class="bold">My subjects</h5>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="true">Videos</a>
                <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="false">Wishlist</a>
                <a class="nav-link" id="books-tab" data-toggle="tab" href="#books" role="tab" aria-controls="books" aria-selected="false">Books</a>
                <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notes</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-4" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                <div class="row">
                    @forelse($subjects as $subject)
                        @foreach(\App\Models\Subject::where('id', $subject->subscriptionable_id)->get() as $item)
                            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                                <a href="{{ route('subjects.index', $item->slug) }}" style="text-decoration: none">
                                    <div class="card mb-4">
                                        <img src="{{ $item->image_thumb}}" alt="{{ $item->very_short_title }}" width="100%" height="150">
                                        <div class="card-body">
                                            <span class="bold">{{ $item->very_short_title }}</span><br />
                                            <span class="author-font">{{$item->creator->name }}</span>
                                            @if($item->averageRating)
                                                <div class="star-display">
                                                    @for($i = $item->averageRating; $i >= 1; $i--)
                                                        <label for="rate-{{$i}}" class="fa fa-star"></label>
                                                    @endfor
                                                    <span class="author-font ml-2">({{ $item->subscriptionCount }}) students</span><br />
                                                </div>
                                            @else
                                                <div class="rating">
                                                    @for($i = 0; $i < 5; $i++)
                                                        <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                        </svg>
                                                    @endfor
                                                    <span class="author-font ml-2">({{ $item->subscriptionCount }}) students</span><br />
                                                </div>
                                            @endif
                                            <div class="mt-2 d-flex justify-content-between">
                                                <button id="round-button-2" type="button" class="btn btn-primary btn-sm">Start learning</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @empty
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-center">
                        <p>You currently don't have subjects to learn.</p>
                        <a type="button" href="{{ route('home') }}" class="btn btn-danger mb-4" id="round-button-2">
                            Go shopping
                        </a>
                    </div>
                    @endforelse
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-center">
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                <div class="row">
                    @forelse($wishlistItems as $wishlistItem)
                        <div class="col-sm-6 col-md-6 col-lg-3 mb-3">
                            <div class="card">
                                <a href="{{ route('subjects.index', $wishlistItem->subject->slug) }}" style="text-decoration: none">
                                    <img src="{{ $wishlistItem->subject->image_thumb}}" alt="{{ $wishlistItem->subject->very_short_title }}" width="100%" height="130">
                                    <div class="card-body">
                                        <span class="bold">{{ $wishlistItem->subject->very_short_title }}</span><br />
                                        <span class="author-font">{{$wishlistItem->subject->creator->name }}</span>
                                        @if($wishlistItem->subject->averageRating)
                                            <div class="star-display">
                                                @for($i = $wishlistItem->subject->averageRating; $i >= 1; $i--)
                                                    <label for="rate-{{$i}}" class="fa fa-star"></label>
                                                @endfor
                                                <span class="author-font">({{ $wishlistItem->subject->subscriptionCount }}) students</span>
                                            </div>
                                        @else
                                            <div class="rating">
                                                @for($i = 0; $i < 5; $i++)
                                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                @endfor
                                                <span class="author-font ml-2">({{ $wishlistItem->subject->subscriptionCount }}) students</span><br />
                                            </div>
                                        @endif

                                        @if($wishlistItem->subject->price)
                                            <span class="bold">UGX {{  $wishlistItem->subject->formatPrice }}/-</span>
                                        @else
                                            <span class="bold paid_color">Free</span>
                                        @endif
                                    </a>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <livewire:add-to-cart :subject="$wishlistItem->subject" :key="$wishlistItem->subject->id" />
                                        <livewire:add-to-wish-list :subject="$wishlistItem->subject" :key="$wishlistItem->subject->id" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-center">
                        <p>No available wishlisted subjects</p>
                        <a type="button" href="{{ route('home') }}" class="btn btn-danger mb-4" id="round-button-2">
                            Go shopping
                        </a>
                    </div>
                    @endforelse
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-center">
                        {{ $wishlistItems->links() }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="books" role="tabpanel" aria-labelledby="books-tab">
                <div class="row">
                    @forelse($books as $book)
                        @foreach(\App\Models\Book::where('id', $book->subscriptionable_id)->get() as $item)
                            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                                <a href="{{ route('student.books.show', $item->slug) }}" style="text-decoration: none">
                                    <div class="card mb-4">
                                        <img src="{{ $item->getFirstMediaUrl('teacher_cover_image') }}" alt="{{ $item->very_short_title }}" width="100%" height="150">
                                        <div class="card-body">
                                            <span class="bold">{{ $item->very_short_title }}</span><br />
                                            <span class="author-font">{{$item->creator->name }}</span>
                                            <div class="mt-2 d-flex justify-content-between">
                                                <button id="round-button-2" type="button" class="btn btn-primary btn-sm">Start learning</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @empty
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-center">
                        <p>You currently don't have books</p>
                        <a type="button" href="{{ route('student.books.index') }}" class="btn btn-danger mb-4" id="round-button-2">
                            Go shopping
                        </a>
                    </div>
                    @endforelse
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-center">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                <div class="row">
                    @forelse($notes as $note)
                        @foreach(\App\Models\Note::where('id', $note->subscriptionable_id)->get() as $item)
                            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                                <a href="{{ route('student.notes.show', $item->slug) }}" style="text-decoration: none">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <span class="bold">{{ $item->very_short_title }}</span><br />
                                            <span class="author-font">{{$item->creator->name }}</span>
                                            <div class="mt-2 d-flex justify-content-between">
                                                <button id="round-button-2" type="button" class="btn btn-primary btn-sm">Start learning</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @empty
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-center">
                        <p>You currently don't have notes</p>
                        <a type="button" href="{{ route('student.notes.index') }}" class="btn btn-danger mb-4" id="round-button-2">
                            Go shopping
                        </a>
                    </div>
                    @endforelse
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-center">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/my-subjects.js')}}" type="text/javascript"></script>
@endpush
