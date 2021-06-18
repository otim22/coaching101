<div>
    @if($book->isSubscribedTo)
        @if($book->creator)
            <a href="{{ $book->getFirstMediaUrl('books') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View book
            </a>
        @endif
    @else
        <div class="d-flex justify-content-between">
            <livewire:add-to-cart :subject="$book" />
            <livewire:add-to-wish-list :subject="$book" />
        </div>
    @endif
</div>
