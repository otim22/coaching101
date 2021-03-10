<div class="row">
    @forelse($books as $book)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
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
                                    UGX {{ $book->formatPrice }}/- <span class="author-font">(Paid)</span>
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
                                    <span class="bold">UGX {{ $book->formatPrice }}/-</span>
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
                                <span class="bold">UGX {{ $book->formatPrice }}/-</span>
                            @else
                                <span class="bold paid_color">Free</span>
                            @endif
                        @endif
                        <div class="mt-2">
                            <livewire:buy-book :book="$book" />
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
