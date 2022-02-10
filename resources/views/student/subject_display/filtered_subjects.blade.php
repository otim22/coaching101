<div class="row">
    @forelse($subjects as $subject)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <a href="{{ route('subjects.show', $subject->slug) }}" style="text-decoration: none">
                <div class="card mb-2">
                    <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                        <img src="{{ $subject->getFirstMediaUrl('cover_images') }}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                            <span class="bold">{{ $subject->very_short_title }}</span><br />
                            By <span class="author-font">{{$subject->creator->name }}</span><br />
                            @if($subject->averageRating)
                                <div class="star-display">
                                    @for($i = $subject->averageRating; $i >= 1; $i--)
                                        <label for="rate-{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    @if($subject->isSubscribedTo)
                                        <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
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
                                    <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                @endif
                            </div>
                            @endif

                            @if($subject->price)
                                @if($subject->isSubscribedTo)
                                    <span class="author-font">{{ $subject->currency->name }} {{  $subject->formatPrice }}/- (Paid)</span></span>
                                @else
                                    <span class="bold">{{ $subject->currency->name }} {{  $subject->formatPrice }}/-</span>
                                @endif
                            @else
                                <span class="bold paid_color">Free</span>
                            @endif
                        </a>
                        <div class="mt-2 d-flex justify-content-between">
                            @if($subject->isSubscribedTo)
                                <a id="round-button-2" class="btn btn-sm btn-outline-primary" href="{{ route('subjects.index', $subject) }}" style="text-decoration: none;">Start learning</a>
                            @else
                                <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
            <p>The subject(s) you are looking for was not found. </p>
        </div>
    @endforelse
    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
        {{ $subjects->links() }}
    </div>
</div>
