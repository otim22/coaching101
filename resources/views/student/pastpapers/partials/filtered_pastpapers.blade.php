<div class="row">
    @forelse($pastpapers as $pastpaper)
        @if($pastpaper->is_approved)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            @if($pastpaper->isSubscribedTo)
                                <a href="{{ route('student.pastpapers.show', $pastpaper) }}" style="text-decoration: none" class="title-font">
                                    <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                    @if($pastpaper->creator)
                                        <span class="author-font">By {{ $pastpaper->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($pastpaper->price)
                                        UGX {{ number_format($pastpaper->price) }}/- <span class="author-font">(Paid)</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                </a>
                            @elseif(!$pastpaper->price)
                                <a href="{{ route('student.pastpapers.show', $pastpaper) }}" style="text-decoration: none" class="title-font">
                                    <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                    @if($pastpaper->creator)
                                        <span class="author-font">By {{ $pastpaper->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($pastpaper->price)
                                        UGX {{ number_format($pastpaper->price) }}/- <span class="author-font">(Paid)</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                </a>
                            @else
                                <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                @if($pastpaper->creator)
                                    <span class="author-font">By {{ $pastpaper->creator->name }}</span><br />
                                @else
                                    <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                @endif

                                @if($pastpaper->price)
                                    <span class="bold">UGX {{ number_format($pastpaper->price) }}/-</span>
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
        @endif
    @empty
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
            <p>The pastpaper(s) you are looking for was not found. </p>
        </div>
    @endforelse
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
            {{ $pastpapers->links() }}
        </div>
</div>
