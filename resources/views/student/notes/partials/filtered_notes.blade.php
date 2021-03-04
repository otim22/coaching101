<div class="row">
    @forelse($notes as $note)
        @if($note->is_approved)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            @if($note->isSubscribedTo)
                                <a href="{{ route('student.notes.show', $note) }}" style="text-decoration: none" class="title-font">
                                    <span class="bold">{{ $note->very_short_title }}</span><br />
                                    @if($note->creator)
                                        <span class="author-font">By {{ $note->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($note->price)
                                        UGX {{ number_format($note->price) }}/- <span class="author-font">(Paid)</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                </a>
                            @elseif(!$note->price)
                                <a href="{{ route('student.notes.show', $note) }}" style="text-decoration: none" class="title-font">
                                    <span class="bold">{{ $note->very_short_title }}</span><br />
                                    @if($note->creator)
                                        <span class="author-font">By {{ $note->creator->name }}</span><br />
                                    @else
                                        <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                    @endif

                                    @if($note->price)
                                        UGX {{ number_format($note->price) }}/- <span class="author-font">(Paid)</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                </a>
                            @else
                                <span class="bold">{{ $note->very_short_title }}</span><br />
                                @if($note->creator)
                                    <span class="author-font">By {{ $note->creator->name }}</span><br />
                                @else
                                    <span class="author-font">By {{ \App\Constants\GlobalConstants::ADMIN }}</span><br />
                                @endif

                                @if($note->price)
                                    <span class="bold">UGX {{ number_format($note->price) }}/-</span>
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
        @endif
    @empty
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
            <p>The note(s) you are looking for was not found. </p>
        </div>
    @endforelse
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
            {{ $notes->links() }}
        </div>
</div>
