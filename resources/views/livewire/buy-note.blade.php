<div>
    @if($note->price)
        @if($note->isSubscribedTo)
            @if($note->creator)
                <a href="{{ $note->getFirstMediaUrl('teacher_note') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                Download notes
                </a>
            @else
                <a href="{{ $note->getFirstMediaUrl('note') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                Download notes
                </a>
            @endif
        @else
            <button type="button" id="round-button-2"
                            name="button"
                            wire:click="checkout({{ $note->id }})"
                            class="btn btn-outline-danger btn-sm">
                            Buy notes
            </button>
        @endif
    @else
        @if($note->creator)
            <a href="{{ $note->getFirstMediaUrl('teacher_note') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            Download notes
            </a>
        @else
            <a href="{{ $note->getFirstMediaUrl('note') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            Download notes
            </a>
        @endif
    @endif
</div>
