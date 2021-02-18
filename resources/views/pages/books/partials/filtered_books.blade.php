<div class="row" id="subject_data">
    @forelse($books as $book)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="mb-3">
                <div class="card">
                    @if($book->isSubscribedTo)
                        <a href="{{ route('books.show', $book) }}" style="text-decoration: none">
                            <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="" width="100%" height="150">
                        </a>
                    @elseif(!$book->price)
                        <a href="{{ route('books.show', $book) }}" style="text-decoration: none">
                            <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="" width="100%" height="150">
                        </a>
                    @else
                        <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="" width="100%" height="150">
                    @endif
                    <div class="card-body card-body_custom">
                        @if($book->isSubscribedTo)
                            <a href="{{ route('books.show', $book) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $book->very_short_title }}</span><br />
                                @if($book->creator)
                                    <span class="author-font">By {{ $book->creator->name }}</span><br />
                                @else
                                    <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                @endif

                                @if($book->price)
                                    UGX {{ number_format($book->price) }}/- <span class="author-font">(Bought)</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                        @elseif(!$book->price)
                            <a href="{{ route('books.show', $book) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $book->very_short_title }}</span><br />
                                @if($book->creator)
                                    <span class="author-font">By {{ $book->creator->name }}</span><br />
                                @else
                                    <span class="author-font">By Coaching101</span><br />
                                @endif

                                @if($book->price)
                                    <span class="bold">UGX {{ number_format($book->price) }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                        @else
                            <span class="bold">{{ $book->very_short_title }}</span><br />
                            @if($book->creator)
                                <span class="author-font">By {{ $book->creator->name }}</span><br />
                            @else
                                <span class="author-font">By Coaching101</span><br />
                            @endif

                            @if($book->price)
                                <span class="bold">UGX {{ number_format($book->price) }}/-</span>
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
            <p>No books available</p>
        </div>
    @endforelse
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
</div>
