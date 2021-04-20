<div>
    @if($book->price)
        @if($book->isSubscribedTo)
            @if($book->creator)
                <a href="{{ $book->getFirstMediaUrl('teacher_book') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                View book
                </a>
            @else
                <a href="{{ $book->getFirstMediaUrl('book') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                View book
                </a>
            @endif
        @else
            <!-- <button type="button" id="round-button-2"
                            name="button"
                            wire:click="checkout({{ $book->id }})"
                            class="btn btn-outline-danger btn-sm">
                            Buy book
            </button> -->
            <div class="mt-2 d-flex justify-content-between">
                <livewire:add-to-cart :subject="$book" />
                <livewire:add-to-wish-list :subject="$book" />
            </div>
        @endif
    @else
        @if($book->creator)
            <a href="{{ $book->getFirstMediaUrl('teacher_book') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View book
            </a>
        @else
            <a href="{{ $book->getFirstMediaUrl('book') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View book
            </a>
        @endif
    @endif
</div>
