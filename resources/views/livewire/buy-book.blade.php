<div>
    @if($book->price)
        @if($book->isSubscribedTo)
            <a href="{{ $book->getFirstMediaUrl('book') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-danger btn-sm" target="_blank">
                            Download book
            </a>
        @else
            <button type="button" id="round-button-2"
                            name="button"
                            wire:click="checkout({{ $book->id }})"
                            class="btn btn-outline-danger btn-sm">
                            Buy book
            </button>
        @endif
    @else
    <a href="{{ $book->getFirstMediaUrl('book') }}" id="round-button-2"
                    name="button"
                    class="btn btn-outline-danger btn-sm" target="_blank">
                    Download book
    </a>
    @endif
</div>
