<div class="row">
    @forelse($notes as $note)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        @if($note->isSubscribedTo)
                            <a href="{{ route('student.notes.show', $note) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $note->very_short_title }}</span><br />
                                @if($note->creator)
                                    <span class="author-font">{{ $note->creator->name }}</span><br />
                                @endif

                                @if($note->price)
                                    {{ $note->currency->name }} {{ $note->formatPrice }}/- <span class="author-font">(Paid)</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                        @else
                            <a href="{{ route('student.notes.show', $note) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $note->very_short_title }}</span><br />
                                @if($note->creator)
                                    <span class="author-font">{{ $note->creator->name }}</span><br />
                                @endif

                                @if($note->price)
                                    <span class="bold">{{ $note->currency->name }} {{ $note->formatPrice }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                        @endif
                        <div class="mt-2">
                            <livewire:buy-note :note="$note" />
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
