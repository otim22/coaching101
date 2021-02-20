<div>
    @if($note->price)
        @if($note->isSubscribedTo)
            <a href="{{ $note->getFirstMediaUrl('note') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-danger btn-sm" target="_blank">
                            Download notes
            </a>
        @else
            <button type="button" id="round-button-2"
                            name="button"
                            wire:click="checkout({{ $note->id }})"
                            class="btn btn-outline-danger btn-sm">
                            Buy notes
            </button>
        @endif
    @else
    <a href="{{ $note->getFirstMediaUrl('note') }}" id="round-button-2"
                    name="button"
                    class="btn btn-outline-danger btn-sm" target="_blank">
                    Download notes
    </a>
    @endif
</div>
