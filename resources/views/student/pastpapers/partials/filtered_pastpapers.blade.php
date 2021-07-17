<div class="row">
    @forelse($pastpapers as $pastpaper)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        @if($pastpaper->isSubscribedTo)
                            <a href="{{ route('student.pastpapers.show', $pastpaper) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                @if($pastpaper->creator)
                                    <span class="author-font">{{ $pastpaper->creator->name }}</span><br />
                                @endif

                                @if($pastpaper->price)
                                    {{ $subject->currency->name }} {{ $pastpaper->formatPrice }}/- <span class="author-font">(Paid)</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                        @else
                            <a href="{{ route('student.pastpapers.show', $pastpaper) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $pastpaper->very_short_title }}</span><br />
                                @if($pastpaper->creator)
                                    <span class="author-font">{{ $pastpaper->creator->name }}</span><br />
                                @endif

                                @if($pastpaper->price)
                                    <span class="bold">{{ $subject->currency->name }} {{ $pastpaper->formatPrice }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                        @endif
                        <div class="mt-2">
                            <livewire:buy-pastpaper :pastpaper="$pastpaper" />
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
