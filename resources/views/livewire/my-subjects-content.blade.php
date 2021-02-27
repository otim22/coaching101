<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <h4>My subjects</h4>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-all-subjects-tab" data-toggle="tab" href="#nav-all-subjects" role="tab" aria-controls="nav-all-subjects" aria-selected="true">All Subjects</a>
                <a class="nav-link" id="nav-wishlist-tab" data-toggle="tab" href="#nav-wishlist" role="tab" aria-controls="nav-wishlist" aria-selected="false">Wishlist subjects</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-4" id="nav-all-subjects" role="tabpanel" aria-labelledby="nav-all-subjects-tab">
                <div class="row">
                    @forelse($subjects as $subject)
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <a href="{{ route('subjects.index', $subject->subject->slug) }}" style="text-decoration: none">
                                <div class="card mb-4">
                                    <img src="{{ $subject->subject->image_thumb}}" alt="{{ $subject->subject->very_short_title }}" width="100%" height="150">
                                    <div class="card-body">
                                        <span class="bold">{{ $subject->subject->very_short_title }}</span><br />
                                        <span class="author-font">By {{$subject->subject->creator->name }}</span>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <button id="round-button-2" type="button" class="btn btn-primary btn-sm" href="#">Start learning</button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-center">
                        <p>You currently don't have subjects to learn</p>
                        <a type="button" href="{{ url('/') }}" class="btn btn-danger mb-4" id="round-button-2">
                            Go shopping
                        </a>
                    </div>
                    @endforelse
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-center">
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="nav-wishlist" role="tabpanel" aria-labelledby="nav-wishlist-tab">
                <div class="row">
                    @forelse($wishlistItems as $wishlistItem)
                    <div class="col-sm-6 col-md-6 col-lg-3 mb-3">
                        <div class="card">
                            <a href="{{ route('subjects.index', $wishlistItem->subject->slug) }}" style="text-decoration: none">
                                <img src="{{ $wishlistItem->subject->image_thumb}}" alt="{{ $wishlistItem->subject->very_short_title }}" width="100%" height="130">
                                <div class="card-body">
                                    <span class="bold">{{ $wishlistItem->subject->very_short_title }}</span><br />
                                    <span class="author-font">By {{$wishlistItem->subject->creator->name }}</span>
                                    @if($wishlistItem->subject->averageRating)
                                        <div class="star-display">
                                            @for($i = 0; $i <= $wishlistItem->subject->averageRating; $i++)
                                                <label for="rate-{{$i}}" class="fa fa-star"></label>
                                            @endfor
                                            <span class="author-font">({{ $wishlistItem->subject->getSubscriptionCount() }}) students</span>
                                        </div>
                                    @else
                                        <div class="rating">
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <span class="author-font ml-2">({{ $wishlistItem->subject->getSubscriptionCount() }}) students</span><br />
                                        </div>
                                    @endif
                                    </div>
                                    @if($wishlistItem->subject->price)
                                        <span class="bold">UGX {{ number_format($wishlistItem->subject->price) }}/-</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                    <div class="mt-2 d-flex justify-content-between">
                                        <livewire:add-to-cart :subject="$wishlistItem->subject" :key="$wishlistItem->subject->id" />
                                        <livewire:add-to-wish-list :subject="$wishlistItem->subject" :key="$wishlistItem->subject->id" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-center">
                        <p>No available wishlisted subjects</p>
                        <a type="button" href="{{ url('/') }}" class="btn btn-danger mb-4" id="round-button-2">
                            Go shopping
                        </a>
                    </div>
                    @endforelse
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 d-flex justify-content-center">
                        {{ $wishlistItems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
