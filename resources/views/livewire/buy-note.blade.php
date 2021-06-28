<div>
    @if($note->isSubscribedTo)
        @if($note->creator)
            <a href="{{ $note->getFirstMediaUrl('notes') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View notes
            </a>
        @endif
    @else
        <div class="mt-2 d-flex justify-content-between">
            <livewire:add-to-cart :subject="$note" />
            <livewire:add-to-wish-list :subject="$note" />
        </div>
    @endif
</div>
