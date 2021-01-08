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
                            <a href="{{ route('subjects.show', $subject->subject->slug) }}" style="text-decoration: none">
                                <div class="card mb-4">
                                    <img src="{{ $subject->subject->image_thumb}}" alt="{{ $subject->subject->very_short_title }}" width="100%" height="130">
                                    <div class="card-body card-body_custom">
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
                    Wishlist
                </div>
            </div>
        </div>
    </div>
</div>
